 var swiperBlason = new Swiper('.swiper-container', {
        slidesPerView: 1.3,
        speed: 700,
        setWrapperSize: true,
        effect: 'slide',
        spaceBetween: 20,
        centeredSlides: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: false,
            dynamicBullets: true,
        },
    });

    var firstSlideBlason = swiperBlason.slides[0];
    firstSlideBlason.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.25), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";

    var nbrOfSlidesBlason = swiperBlason.slides.length;

    for (var i = 1; i < nbrOfSlidesBlason; i++) {
        /*swiper.slides[i].style.height = "98%";*/
        swiperBlason.slides[i].style.boxShadow = "none";
    }

    swiperBlason.on('slideChangeTransitionStart', function () {
        var nbrOfSlides = swiperBlason.slides.length;
        var currentSlideId = swiperBlason.activeIndex;

        for (var i = 0; i < nbrOfSlides && i != currentSlideId; i++) {
            swiperBlason.slides[i].style.transition = "box-shadow .3s ease-in-out";
            /*swiper.slides[i].style.height = "98%";*/
            swiperBlason.slides[i].style.boxShadow = "none";
        }

        swiperBlason.slides[currentSlideId].style.transition = "box-shadow .3s ease-in-out";
        /*swiper.slides[currentSlideId].style.height = "100%";*/
        swiperBlason.slides[currentSlideId].style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
    });