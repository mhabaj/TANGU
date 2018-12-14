var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1.3,
    speed: 700,
    spaceBetween: 30,
    centeredSlides: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: false,
        dynamicBullets: true,
    },
});

var firstSlide = swiper.slides[0];
firstSlide.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.25), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
var nbrOfSlides = swiper.slides.length;

for(var i = 1; i < nbrOfSlides; i++) {
    /*swiper.slides[i].style.height = "98%";*/
    swiper.slides[i].style.boxShadow = "none";
}

swiper.on('slideChangeTransitionStart', function() {
    var nbrOfSlides = swiper.slides.length;
    var currentSlideId = swiper.activeIndex;

    for (var i = 0; i < nbrOfSlides && i != currentSlideId; i++) {
        swiper.slides[i].style.transition = "box-shadow .3s ease-in-out";
        /*swiper.slides[i].style.height = "98%";*/
        swiper.slides[i].style.boxShadow = "none";
    }
    swiper.slides[currentSlideId].style.transition = "box-shadow .3s ease-in-out";
    /*swiper.slides[currentSlideId].style.height = "100%";*/
    swiper.slides[currentSlideId].style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
});