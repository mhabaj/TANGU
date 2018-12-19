<div class="swiper-container" id="contentBox">
    <div class="swiper-wrapper">
        <div class="container swiper-slide" id="e1">
            <h3>Nom arc</h3>
        </div>
        <div class="container swiper-slide" id="e2">
            <h3>Nom arc</h3>
        </div>
        <div class="container swiper-slide" id="e3">
            <h3>Nom arc</h3>
        </div>
        <div class="container swiper-slide" id="e4">
            <h3>Nom arc</h3>
        </div>
        <div class="container swiper-slide" id="e5">
            <h3>Nom arc</h3>
        </div>
        <div class="container swiper-slide" id="e6">
            <h3>Nom arc</h3>
        </div>
        <div class="container swiper-slide" id="e7">
            <h3>Nom arc</h3>
        </div>
        <div class="container swiper-slide" id="e8">
            <h3>Nom arc</h3>
        </div>
        <div class="container swiper-slide" id="e9">
            <h3>Nom arc</h3>
        </div>
        <div class="container swiper-slide" id="e10">
            <h3>Nom arc</h3>
        </div>
        <div class="container swiper-slide" id="e11">
            <h3>Nom arc</h3>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<script>
    var swiperArc = new Swiper('.swiper-container', {
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

    var firstSlideArc = swiperArc.slides[0];
    firstSlideArc.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.25), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
    var nbrOfSlidesArc = swiperArc.slides.length;
    
    for(var i = 1; i < nbrOfSlidesArc; i++) {
        /*swiper.slides[i].style.height = "98%";*/
        swiperArc.slides[i].style.boxShadow = "none";
    }

    swiperArc.on('slideChangeTransitionStart', function() {
        var nbrOfSlides = swiperArc.slides.length;
        var currentSlideId = swiperArc.activeIndex;

        for (var i = 0; i < nbrOfSlides && i != currentSlideId; i++) {
            swiperArc.slides[i].style.transition = "box-shadow .3s ease-in-out";
            /*swiper.slides[i].style.height = "98%";*/
            swiperArc.slides[i].style.boxShadow = "none";
        }
        swiperArc.slides[currentSlideId].style.transition = "box-shadow .3s ease-in-out";
        /*swiper.slides[currentSlideId].style.height = "100%";*/
        swiperArc.slides[currentSlideId].style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
    });
</script>