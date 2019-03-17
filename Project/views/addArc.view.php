<div class="container-fluid" id="mainBox">
    <?php include 'views/includes/back-header.php'; ?>


    <form method="POST" enctype="multipart/form-data">

        <h3>Création d'arc</h3>

        <div class="form-group">
            <label>Nom de l'arc
                <mark>*</mark>
            </label>
            <input type="Text" class="form-control" max="19" autocomplete="off" min="1"
                   name="Nomarc" placeholder="Nom de l'arc">
        </div>


        <div class="form-group">
            <label>Poids de l'arc (kg)
                <mark>*</mark>
            </label>
            <input class="form-control" type="number" placeholder="Poids de l'arc" max="50" min="1"
                   name="Poids">
        </div>

        <div class="form-group">
            <label>Taille de l'arc (cm)
                <mark>*</mark>
            </label>
            <input type="number" class="form-control" placeholder="Taille de l'arc" max="230" min="1"
                   name="Taille">
        </div>

        <div class="form-group">
            <label>Force de l'arc (N)
                <mark>*</mark>
            </label>
            <input type="number" class="form-control" placeholder="Force de l'arc" max="190" min="1"
                   name="Force">
        </div>

        <div class="form-group">
            <label>Type de l'arc
                <mark>*</mark>
            </label>
            <input type="text" class="form-control" placeholder="Type de l'arc" max="60" min="1" name="Type">
        </div>


        <div class="form-group">
            <label for="Commentairesdivers">Commentaires divers</label>
            <textarea class="form-control" id="Commentairesdivers" rows="3" name="commArc" max="120"
                      placeholder="Commentaires"></textarea>
        </div>
        <div class="form-group">
            <h5>Photo de l'arc</h5><input type="image" max="1024" value="" name="Photo">

            <input type="hidden" name="MAX_FILE_SIZE" value="8388608">
            <label for="photo"> Photo (JPG, JPEG, PNG or GIF | max.8 Mo) :</label><br/>
            <input type="file" id="photo" name="photo"/><br/>
            <br>
        </div>

        <button type="submit" name="envoyerCreateArc" class="btn btn-primary">Submit</button>
    </form>

</div>
