
        <div class="container-fluid" id="mainBox">
            <?php include_once 'includes/header.php';?>
            <div class="container-fluid" id="selectBox">
                <i class="fas fa-chevron-down fa-sm"></i>
                <form name="selectForm" method="POST">
                    <select name="selectInput" id="selectInput">
                        <option value="arc" onclick="document.getElementById('selectForm').submit()">Arc</option>
                        <option value="blason" onclick="document.getElementById('selectForm').submit()">Blason</option>
                    </select>
                </form>
            </div>
            <?php include_once 'arcSlides.view.php' ?>
            <?php include_once 'includes/footer.php';?>
        </div>
        <script src="../assets/js/swiper.js"></script>
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
