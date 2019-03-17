<div class="container-fluid" id="mainBox">
    <div class="container-fluid" id="formBox">
        <form method="post" id="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h3>Nouveau Pseudo</h3><br>
            <input type="text" name="newPseudo" id="pseudoInput" placeholder="Entrer votre nouveau pseudo..." autocomplete="off" maxlength="30">
            <?php include 'includes/back-header.php';?>
        </form>
    </div>
</div>
<script>
    let pseudoInput = document.getElementById("pseudoInput"),
        checkButton = document.getElementById("right-btn"),
        checkSign = document.getElementById("check");

    checkButton.disabled = true;

    pseudoInput.addEventListener("input", function() {
        let inputLength = pseudoInput.value.length;
        if(inputLength < 3 || inputLength > 30) {
            //Wrong red
            pseudoInput.style.borderColor = "rgba(255, 59, 48, 1)";
            checkSign.style.color = "rgba(130, 127, 254, 0.55)";
            checkSign.style.filter = "blur(0.65px)";
            checkButton.disabled = true;
        } else {
            //Right green
            pseudoInput.style.borderColor = "rgba(76, 217, 100, 1)";
            checkSign.style.color = "rgba(130, 127, 254, 1)";
            checkSign.style.filter = "none";
            checkButton.disabled = false;
        }
    });

</script>
