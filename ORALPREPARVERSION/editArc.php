<?php
require_once 'controllers/functions/control-session.php';
$title = "Personnaliser";?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= $title?></title>

    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/edit.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/swiper.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    
	
               



  <div class="container-fluid" id="mainBox">
            <?php include_once 'views/includes/header.php';?>
          
            
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
		
		 <div class="container-fluid" id="selectBox">
               					
          <a href="editBlason.php">     <input name="submitChoix" type="submit"  value="Blasons"> </a>
			
			
			<form method="POST"  > 
			
			
			<select name="SelectForm"  onchange="this.form.submit()">
			<option value="Blason">Blasons</option>
			<option value="Arc">Arcs</option>
			</select>
        
				</form>
			
				<?php
				
				
				
				if (ISSET($_POST['SelectForm'])){
					
					
					if (  ){
						
						
						
					}
					
					
				
				
				
				?>
				
            </div>
		
		
		
            </div>
      
            <?php include_once 'views/includes/footer.php';?>
        
        <script src="assets/js/swiper.min.js"></script> 
		
		</div>
      
    </body>
</html>


			   
			   
			   
			   
		
           


	
	
	
	
	
	
	<script>
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

    for(var i = 1; i < nbrOfSlidesBlason; i++) {
        /*swiper.slides[i].style.height = "98%";*/
        swiperBlason.slides[i].style.boxShadow = "none";
    }

    swiperBlason.on('slideChangeTransitionStart', function() {
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

</script>
	