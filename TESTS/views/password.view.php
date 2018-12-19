<div class="container-fluid" id="mainBox">
    <div class="container-fluid" id="formBox">
        <form method="post" id="myform">
            <div id="currentPwdBox">
                <h3>Mot de Passe Actuel</h3><br>
                <input type="password" name="currentPwd" id="currentPwd" placeholder="Mot de passe actuel..." autocomplete="off" maxlength="30">
            </div>
            <div id="newPwdBox">
                <h3>Nouveau Mot de Passe</h3><br>
                <input type="password" name="newPwd" id="newPwd" placeholder="Nouveau mot de passe" autocomplete="off" maxlength="30">
            </div>
            <div id="confirmPwdBox">
                <h3>Confirmer le Nouveau Mot de Passe</h3><br>
                <input type="password" name="confirmPwd" id="confirmPwd" placeholder="Confirmer votre nouveau mot de passe" autocomplete="off" maxlength="30">
            </div>
            <?php include 'includes/back-header.php';?>
        </form>
    </div>
</div>

<script>
    var currentPwdInput = document.getElementById("currentPwd"),
        newPwdInput = document.getElementById("newPwd"),
        confirmPwdInput = document.getElementById("confirmPwd"),
        checkButton = document.getElementById("right-btn"),
        checkSign = document.getElementById("check");

    checkButton.disabled = true;
    var inputs = [currentPwdInput, newPwdInput];
    var check = [];

    currentPwdInput.addEventListener('input', function() {
        if(currentPwdInput.value.length < 6 || currentPwdInput.value.length > 30) {
            errorDisplay(currentPwdInput);
            hideSubmitDisplay();
            check[0] = false;
        } else {
            successDisplay(currentPwdInput);
            check[0] = true;

        }
        if(check[0] && check[1] && check[2]) {
            allowSubmitDisplay();
        }

        newPwdInput.addEventListener('input', function() {
            if(newPwdInput.value.length < 6 || newPwdInput.value.length > 30) {
                errorDisplay(newPwdInput);
                hideSubmitDisplay();
                check[1] = false;
            } else {
                successDisplay(newPwdInput);
                check[1] = true;
            }

            confirmPwdInput.addEventListener('input', function() {
                if (confirmPwdInput.value != newPwdInput.value || confirmPwdInput.value.length > 30) {
                    errorDisplay(confirmPwdInput);
                    hideSubmitDisplay();
                    check[1] = false;
                    check[2] = false;
                } else {
                    check[1] = true;
                    check[2] = true;
                    successDisplay(confirmPwdInput);
                    successDisplay(newPwdInput);
                }
                if(check[0] && check[1] && check[2]) {
                    allowSubmitDisplay();
                }
            });

            if (confirmPwdInput.value != newPwdInput.value) {
                errorDisplay(newPwdInput);
                hideSubmitDisplay();
                check[1] = false;
                check[2] = false;
            } else {
                check[1] = true;
                check[2] = true;
                successDisplay(newPwdInput);
            }
            if(check[0] && check[1] && check[2]) {
                allowSubmitDisplay();
            } else {
                hideSubmitDisplay();
            }
        });
    });

    function errorDisplay(field) {
        field.style.borderColor = "rgba(255, 59, 48, 1)";
    }

    function successDisplay(field) {
        field.style.borderColor = "rgba(76, 217, 100, 1)";
    }

    function hideSubmitDisplay() {
        checkSign.style.color = "rgba(130, 127, 254, 0.55)";
        checkSign.style.filter = "blur(0.65px)";
        checkButton.disabled = true;
    }

    function allowSubmitDisplay() {
        checkSign.style.color = "rgba(130, 127, 254, 1)";
        checkSign.style.filter = "none";
        checkButton.disabled = false;
    }
</script>
