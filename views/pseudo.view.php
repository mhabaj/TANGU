<div class="container-fluid" id="mainBox">
    <?php include 'includes/back-header.php';?>
    <div class="container-fluid" id="formBox">
        <form>
            <h3>Nouveau Pseudo</h3><br>
            <input type="text" name="newPseudo" id="pseudoInput" placeholder="Entrer votre nouveau pseudo..." autocomplete="off" maxlength="30">
        </form>
    </div>
</div>

<script>
    function updatePseudo(pseudo) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET","getPseudo.php?pseudo=" + pseudo, true);
        xmlhttp.send();
    }
</script>
<script>
    let pseudoInput = document.getElementById("pseudoInput"),
        checkButton = document.getElementById("right-button"),
        checkSign = document.getElementById("check");

    pseudoInput.addEventListener("input", function() {
        let inputLength = pseudoInput.value.length;
        if(inputLength < 6 || inputLength > 20) {
            //Wrong red
            pseudoInput.style.borderColor = "rgba(255, 59, 48, 1)";
            checkSign.style.color = "rgba(130, 127, 254, 0.55)";
            checkSign.style.filter = "blur(0.65px)";
            checkButton.style.pointerEvents = "none";
        } else {
            //Right green
            pseudoInput.style.borderColor = "rgba(76, 217, 100, 1)";
            checkSign.style.color = "rgba(130, 127, 254, 1)";
            checkSign.style.filter = "none";
            checkButton.style.pointerEvents = "auto";
        }
    });

</script>
