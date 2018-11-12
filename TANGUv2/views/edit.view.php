
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
            <div w3-include-html=""

            <?php include_once 'includes/footer.php';?>
        </div>
        <script src="../assets/js/swiper.min.js"></script>
        <script></script>
    </body>
</html>
