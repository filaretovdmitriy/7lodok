$(document).ready(function () {
    $('.slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: true,
    });
});
/*
var html5Slider = document.getElementById('input-range');
var inputNumbermin = document.getElementById('input-number-min');
var inputNumbermax = document.getElementById('input-number-max');

noUiSlider.create(html5Slider, {
    start: [0, 10000],
    connect: true,
    range: {
        'min': 0,
        'max': 10000
    }
});



html5Slider.noUiSlider.on('update', function (values, handle) {
    var value = values[handle];
    if (handle) {
        inputNumbermax.value = value;
    } else {
        inputNumbermin.value = value;
    }
});



inputNumbermin.addEventListener('change', function () {
    html5Slider.noUiSlider.set([this.value]);
});


inputNumbermax.addEventListener('change', function () {
    html5Slider.noUiSlider.set([null, this.value]);
});*/