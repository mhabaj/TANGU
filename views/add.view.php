
        <div class="container-fluid" id="mainBox">
            <?php include 'includes/header.php'; ?>
            <div class="container-fluid" id="formBox">
                <form method="POST">
                    <input name="nom" placeholder="Nom " maxlength='30' type="text" value="">
                    <input name="lieu" placeholder="Lieu " maxlength='200' type="text" value="">
                    <input name="date" placeholder="Date" type="datetime-local" value="">
                    <input name="distance" placeholder="Distance" min="1" max="126" type="number" value="">
                    <input name="arc" placeholder="arc"  type="number" value="">
                    <input name="blason" placeholder="blason"  type="number" value="">
                    <input name="serie" placeholder="Serie(s)" min="1" max="5" type="number" value="">
                    <input name="volee" placeholder="Volée(s)" min="1" max="10" type="number" value="">
                    <input name="fleche" placeholder="Fleche(s)" min="1" max="10" type="number" value="">
                    <button type="submit" name="creationEnt">Connexion</button>
                </form>
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>