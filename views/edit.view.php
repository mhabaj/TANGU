
        <div class="container-fluid" id="mainBox">
            <?php include_once 'includes/header.php';?>
            <div class="container-fluid" id="selectBox">
                <i class="fas fa-chevron-down fa-sm"></i>
                <form name="selectForm">
                    <select name="selecInput" id="selectInput">
                        <option value="arc">Arc</option>
                        <option value="blason">Blason</option>
                    </select>
                </form>
            </div>
            
            <!----- ON INCLUDE EN PHP LA SLIDE ARC OU BLASON EN FONCTION DU SELECT
            $selectInput = $_POST['selectInput'];
            if(isset($selectInput)) {
                switch ($selectInput) {
                    case 'arc':
                        include('arcSlides.html');
                        break;
                    case 'blason':
                        include('blasonSlides.html');
                }
            }

--->
            <?php include_once 'includes/footer.php';?>
        </div>
        <script src="../assets/js/swiper.min.js"></script>
    </body>
</html>
