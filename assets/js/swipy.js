var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1.5,
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
firstSlide.style.boxShadow = "0 6px 20px 0 rgba(0, 0, 0, 0.43), 0 -3px 18px 0 rgba(0, 0, 0, 0.23)";
firstSlide.style.transform = "scale(1.08)";
var nbrOfSlides = swiper.slides.length;

for(var i = 1; i < nbrOfSlides; i++) {
    swiper.slides[i].style.boxShadow = "none";
    swiper.slides[i].style.transform = "scale(0.9)";
}

swiper.on('slideChange', function() {
    var nbrOfSlides = swiper.slides.length;
    var currentSlideId = swiper.activeIndex;

    swiper.slides[currentSlideId].style.transition = "transform 500ms ease-in, box-shadow 500ms ease-in";
    swiper.slides[currentSlideId].style.transform = "scale(1.08)";
    swiper.slides[currentSlideId].style.boxShadow = "0 4px 18px 0 rgba(0, 0, 0, 0.33), 0 -3px 18px 0 rgba(0, 0, 0, 0.20)";
    for(let i = 0; i < nbrOfSlides; i++) {
        if(i != currentSlideId) {
            swiper.slides[i].style.transition = "transform 800ms ease-out, box-shadow 500ms linear";
            swiper.slides[i].style.transform = "scale(0.9)";
            swiper.slides[i].style.boxShadow = "0 3px 20px 0 rgba(0, 0, 0, 0.25), 0 -3px 18px 0 rgba(0, 0, 0, 0.13)";
        }
    }

});