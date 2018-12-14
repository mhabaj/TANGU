<div class="container-fluid" id="mainBox">
    <form method="POST" enctype="multipart/form-data">
        <div class="sousline">
            <h5>Nom de l'arc</h5><input type="text" max="" min="" value="" name="Nomarc">
        </div>

        <div class="sousline">
            <h5>Poids de l'arc</h5><input type="number" max="50" min="1" value="" name="Poids">
        </div>

        <div class="sousline">
            <h5>Taille de l'arc</h5><input type="text" value="" max="300" min="1" name="Taille">
        </div>

        <div class="sousline">
            <h5>Force de l'arc</h5><input type="text" value="" max="100" min="1" name="Force">
        </div>

        <div class="sousline">
            <h5>Type de l'arc</h5><input type="text" value="" max="50" min="0" name="Type">
        </div>

        <div class="sousline">
            <h5>Photo de l'arc</h5><input type="image" max="1024" min="1" value="" name="Photo">
        </div>
        <input type="hidden" name="MAX_FILE_SIZE" value="8388608">
        <label for="photo"> Photo (JPG, JPEG, PNG or GIF | max.8 Mo) :</label><br/>
        <input type="file" id="photo" name="photo"/><br/>
        <br>

        <input type="submit" name="envoyerCreateArc">
    </form>
</div>