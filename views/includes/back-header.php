<div class="container-fluid header" id="headerBox">
    <div id="left-button">
        <button type="button" ontouchend="window.location='<?= $left_url;?>'">
            <i class="fas fa-arrow-left fa-lg" id="arrowIcon"></i>
            <i class="fas fa-times fa-lg" id="quitIconLeft"></i>
        </button>
    </div>
    <div id="right-button">
        <button type="submit" name="submitBtn" id="right-btn" disabled>
            <i class="fas fa-check fa-lg" id="check"></i>
            <i class="fas fa-plus fa-lg" id="addIcon"></i>
            <i class="fas fa-times fa-lg" id="quitIconRight"></i>
        </button>
    </div>
</div>