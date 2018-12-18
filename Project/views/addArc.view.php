<div class="container-fluid" id="mainBox">
    <?php include 'views/includes/back-header.php'; ?>
    <form method="POST" enctype="multipart/form-data" id="myform">


        <h5>Nom de l'arc *</h5><input type="text" placeholder="Nom de l'arc" max="19" autocomplete="off" min="1"
                                      name="Nomarc">


        <h5>Poids de l'arc *</h5><input type="number" placeholder="Poids de l'arc" max="50" min="1" value=""
                                        name="Poids">


        <h5>Taille de l'arc *</h5><input type="text" value="" placeholder="Taille de l'arc" max="300" min="1"
                                         name="Taille">


        <h5>Force de l'arc *</h5><input type="text" value="" placeholder="Force de l'arc" max="100" min="1"
                                        name="Force">


        <h5>Type de l'arc *</h5><input type="text" value="" placeholder="Type de l'arc" max="50" min="1" name="Type">


        <h5>Commentaires divers</h5>  <input type="text" name="commArc" max="99" value=""
                                             placeholder="Commentaires">


        <h5>Photo de l'arc</h5><input type="image" max="1024" value="" name="Photo">

        <input type="hidden" name="MAX_FILE_SIZE" value="8388608">
        <label for="photo"> Photo (JPG, JPEG, PNG or GIF | max.8 Mo) :</label><br/>
        <input type="file" id="photo" name="photo"/><br/>
        <br>

        <input type="submit" name="envoyerCreateArc">

    </form>

</div>
