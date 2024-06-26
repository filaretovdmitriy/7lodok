<?php

namespace app\components;

class GooglePageRankChecker
{

    private static $instance;

    /**
     * Получает pageRank
     * @param string $page URL страницы
     * @return integer Доступность файла
     */
    static function getRank($page)
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance->check($page);
    }

    private function stringToNumber($string, $check, $magic)
    {
        $int32 = 4294967296;  // 2^32
        $length = strlen($string);
        for ($i = 0; $i < $length; $i++) {
            $check *= $magic;
            if ($check >= $int32) {
                $check = ($check - $int32 * (int) ($check / $int32));
                //if the check less than -2^31
                $check = ($check < -($int32 / 2)) ? ($check + $int32) : $check;
            }
            $check += ord($string{$i});
        }
        return $check;
    }

    private function createHash($string)
    {
        $check1 = $this->stringToNumber($string, 0x1505, 0x21);
        $check2 = $this->stringToNumber($string, 0, 0x1003F);

        $factor = 4;
        $halfFactor = $factor / 2;

        $check1 >>= $halfFactor;
        $check1 = (($check1 >> $factor) & 0x3FFFFC0 ) | ($check1 & 0x3F);
        $check1 = (($check1 >> $factor) & 0x3FFC00 ) | ($check1 & 0x3FF);
        $check1 = (($check1 >> $factor) & 0x3C000 ) | ($check1 & 0x3FFF);

        $calc1 = (((($check1 & 0x3C0) << $factor) | ($check1 & 0x3C)) << $halfFactor ) | ($check2 & 0xF0F );
        $calc2 = (((($check1 & 0xFFFFC000) << $factor) | ($check1 & 0x3C00)) << 0xA) | ($check2 & 0xF0F0000 );

        return ($calc1 | $calc2);
    }

    private function checkHash($hashNumber)
    {
        $check = 0;
        $flag = 0;

        $hashString = sprintf('%u', $hashNumber);
        $length = strlen($hashString);

        for ($i = $length - 1; $i >= 0; $i --) {
            $r = $hashString{$i};
            if (1 === ($flag % 2)) {
                $r += $r;
                $r = (int) ($r / 10) + ($r % 10);
            }
            $check += $r;
            $flag ++;
        }

        $check %= 10;
        if (0 !== $check) {
            $check = 10 - $check;
            if (1 === ($flag % 2)) {
                if (1 === ($check % 2)) {
                    $check += 9;
                }
                $check >>= 1;
            }
        }

        return '7' . $check . $hashString;
    }

    private function check($page)
    {

        $socket = fsockopen("toolbarqueries.google.com", 80, $errno, $errstr, 30);

        if ($socket) {
            $out = "GET /search?client=navclient-auto&ch=" . $this->checkHash($this->createHash($page)) . "&features=Rank&q=info:" . $page . "&num=100&filter=0 HTTP/1.1\r\n";
            $out .= "Host: toolbarqueries.google.com\r\n";
            $out .= "User-Agent: Mozilla/4.0 (compatible; GoogleToolbar 2.0.114-big; Windows XP 5.1)\r\n";
            $out .= "Connection: Close\r\n\r\n";

            fwrite($socket, $out);

            $result = "";
            while (!feof($socket)) {
                $data = fgets($socket, 128);
                $pos = strpos($data, "Rank_");
                if ($pos !== false) {
                    $pagerank = substr($data, $pos + 9);
                    $result += $pagerank;
                }
            }
            fclose($socket);

            if (!empty($result)) {
                return $result;
            } else {
                return 0;
            }
        }
    }

}
