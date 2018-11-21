
        <div class="container-fluid" id="mainBox">
            <div class="container-fluid header" id="headerBox">
            	<div id="left-arrow">
		        	<button>
		        		<a href="account.php">
                            <!---
                            <i class="fas fa-chevron-left fa-2x"></i>
                            --->
                            <i class="fas fa-arrow-left fa-2x"></i>
                            <!---
                            <img src="img/cross.png" width="45%" height="45%">
                            --->
		        		</a>
		        	</button>
            	</div>
                <div id="right-check">
                    <button disabled>
                        <a href="training.php" id="checkLink">
                            <i class="fas fa-check fa-2x" id="check"></i>
                        </a>
                    </button>
                </div>
            </div>
            <div class="container-fluid" id="formBox">
                <form>
                    <h3>Nouveau Pseudo</h3><br>
                    <input type="text" name="newPseudo" id="pseudoInput" placeholder="Entrer votre nouveau pseudo..." autocomplete="off" maxlength="30">
                </form>
            </div>
        </div>
    
        <script>
            var pseudoInput = document.getElementById("pseudoInput"),
                checkLink = document.getElementById("checkLink"),
                checkSign = document.getElementById("check");
            
            pseudoInput.addEventListener("input", function() {
                inputLength = pseudoInput.value.length;
                if(inputLength < 6 || inputLength > 20) {
                    //Wrong red
                    pseudoInput.style.borderColor = "rgba(255, 59, 48, 1)";
                    checkSign.style.color = "rgba(130, 127, 254, 0.55)";
                    checkSign.style.filter = "blur(0.65px)";
                    checkLink.style.pointerEvents = "none";
                } else {
                    //Right green
                    pseudoInput.style.borderColor = "rgba(76, 217, 100, 1)";
                    checkSign.style.color = "rgba(130, 127, 254, 1)";
                    checkSign.style.filter = "none";
                    checkLink.style.pointerEvents = "auto";
                }
            });
            
        </script>
