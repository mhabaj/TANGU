
        <div class="container-fluid" id="mainBox">
            <?php include_once 'includes/header.php';?>
            <div class="container-fluid" id="selectBox">
                <i class="fas fa-chevron-down fa-sm"></i>
               

			<form method="POST" id="Choixform">
                <!-- <input  name="new_ID_Ent" type="hidden" value="<?php //echo $new_ID_Ent ?>"> -->



            <select name="Choix" form="Choixform">
          
              <option value="arc">Arc</option>
              <option value="blason">Blason</option>
			</select>

			
					<div>		
                <input name="submitChoix" type="submit">
</div>
            </form>

            <?php


            if (isset($_POST['submitChoix'])) {

                if (!empty($_POST['Choix'])) {
					
					$selectInput=$_POST['Choix'];

                    if ($selectInput=='arc') {
							
                        include('arcSlides.php');
					}
						
                     if ($selectInput=='blason') {
                        include('blasonSlides.php');
					 }
						
			}}


                    ?>
			
				
			
				
				
            </div>
      
            <?php include_once 'includes/footer.php';?>
        </div>
        <script src="../assets/js/swiper.min.js"></script>
    </body>
</html>
