<?php
require_once 'controllers/functions/control-session.php';
$title = "Personnaliser";
$back_url = "edit.php";
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/checkHeader.css">
    <link rel="stylesheet" href="assets/css/editArc.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/swiper.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper.min.js"></script>
</head>
<body>
<div class="container-fluid" id="mainBox">
    <?php include_once 'views/includes/back-header.php'; ?>

    <div class="swiper-container" id="contentBox">
        <div class="swiper-wrapper">
            <div class="container swiper-slide" id="e1">
                <h3>Nom blason</h3>
            </div>
            <div class="container swiper-slide" id="e2">
                <h3>Nom blason</h3>
            </div>
            <div class="container swiper-slide" id="e3">
                <h3>Nom blason</h3>
            </div>
            <div class="container swiper-slide" id="e4">
                <h3>Nom blason</h3>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<?php include_once 'views/includes/footer.php'; ?>
</div>
</body>
</html>


			   
			   
			   
			   
		
           


	
	
	
	
	

	