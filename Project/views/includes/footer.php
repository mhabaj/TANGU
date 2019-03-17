<div class="container-fluid footer" id="footerBox">
    <div class="container" id="homeBox">
        <button id="homeBtn">
            <a href="training.php">
                <i class="far fa-list-alt fa-2x" id="trainingLogo"></i>
            </a>
        </button>
        <button id="homeBtn2">
            <a href="training.php">
                <i class="far fa-list-alt fa-lg" id="trainingLogo""></i>
                <p>Entrainements</p>
            </a>
        </button>
        <button id="homeBtn3">
            <a href="training.php">
                <i class="far fa-list-alt fa-3x" id="trainingLogo"></i>
            </a>
        </button>
    </div>
    <div class="container" id="statsBox">
        <button id="statsBtn">
            <a href="stats.php">
                <i class="fas fa-chart-line fa-2x" id="statsLogo"></i>
            </a>
        </button>
        <button id="statsBtn2">
            <a href="stats.php">
                <i class="fas fa-chart-line fa-lg" id="statsLogo"></i>
                <p>Statistiques</p>
            </a>
        </button>
        <button id="statsBtn3">
            <a href="stats.php">
                <i class="fas fa-chart-line fa-3x" id="statsLogo"></i>
            </a>
        </button>
    </div>
    <div class="container" id="addBox">
        <button id="addBtn">
            <a href="add.php">
                <i class="fas fa-plus fa-2x" id="addLogo"></i>
            </a>
        </button>
        <button id="addBtn2">
            <a href="add.php">
                <i class="fas fa-plus fa-lg" id="addLogo"></i>
            </a>
        </button>
        <button id="addBtn3">
            <a href="add.php">
                <i class="fas fa-plus fa-3x" id="addLogo"></i>
            </a>
        </button>
    </div>
    <div class="container" id="editBox">
        <button id="editBtn">
            <a href="edit.php">
                <i class="far fa-edit fa-2x" id="editLogo"></i>
            </a>
        </button>
        <button id="editBtn2">
            <a href="edit.php">
                <i class="far fa-edit fa-lg" id="editLogo"></i>
                <p>Personnaliser</p>
            </a>
        </button>
        <button id="editBtn3">
            <a href="edit.php">
                <i class="far fa-edit fa-3x" id="editLogo"></i>
            </a>
        </button>
    </div>
    <div class="container" id="accountBox">
        <button id="accountBtn">
            <a href="account.php">
                <i class="far fa-user fa-2x" id="accountLogo"></i>
            </a>
        </button>
        <button id="accountBtn2">
            <a href="account.php">
                <i class="far fa-user fa-lg" id="accountLogo"></i>
                <p>Infos</p>
            </a>
        </button>
        <button id="accountBtn3">
            <a href="account.php">
                <i class="far fa-user fa-3x" id="accountLogo"></i>
            </a>
        </button>
    </div>
</div>
<script>
    let title = document.title;
    console.log()
    let titles = ["Entrainements", "Statistiques", "Nouvel Entrainement", "Personnaliser", "Mon Compte"];
    $training = document.getElementById('trainingLogo');
    $stats = document.getElementById('statsLogo');
    $add = document.getElementById('addLogo');
    $edit = document.getElementById('editLogo');
    $account = document.getElementById('accountLogo');

    switch (title) {
        case titles[0]:
            $training.style.color = "#1D3557";
            break;
        case titles[1]:
            $stats.style.color = "";
            break;
        case titles[2]:
            $add.style.color = "";
            break;
        case titles[3]:
            $edit.style.color = "";
            break;
        case titles[4]:
            $account.style.color = "";
            break;
        default:
            break;
    }
</script>