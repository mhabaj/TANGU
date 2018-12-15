<div id="messageBox">
    <p id="messageContent"></p>
</div>
<div class="dark-bckg"></div>
<script>

    function triggerMessageBox(type, content) {
        let messageBox = document.getElementById("messageBox"),
            messageContent = document.getElementById("messageContent");
        if(type == "success") {
            messageBox.style.backgroundColor= "rgb(130, 127, 254)";
        } else if (type == "error") {
            messageBox.style.backgroundColor= "rgb(255, 59, 48)";
        }
        messageContent.innerText = content;
        messageBox.classList.add('bounceInDown');
        window.setTimeout(removeMessageBox, 1800);
    }

    function removeMessageBox() {
        let messageBox = document.getElementById("messageBox");
        messageBox.classList.remove('bounceInDown');
        messageBox.classList.add('bounceOutUp');
    }
</script>