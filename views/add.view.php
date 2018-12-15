<div class="container-fluid addTraining" id="mainBox">
    <?php include 'includes/back-header.php';?>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="newTrainingForm">
        <h3 id="formTitle">Add a new training</h3>
        <div id="nameField">
            <h3>Your Training Name</h3>
            <input type="text" name="name" id="nameInput" placeholder="Enter your training name..." autocomplete="on">
        </div>
        <div id="locationField">
            <h3>Your Training Location</h3>
            <input type="text" name="location" id="locationInput" placeholder="Enter your training location...">
        </div>
        <div id="dateField">
            <h3>The Date</h3>
            <input type="text" name="date" class="datepicker-here" id="dateInput" data-position="top left" data-timepicker="true" data-time-format='h:ii AA' data-language="fr" placeholder="Pick a date...">
        </div>
        <div id="distanceField">
            <h3>Distance(m)</h3>
            <input type="number" name="distance" id="distanceInput"  min="1" max="30" placeholder="Distance...">
        </div>
        <div id="bowsField">
            <h3>Bows</h3>
            <select name="bows" id="sources" class="custom-select sources" placeholder="Source Type">
                <?php
                if(count($arcs) == 0):?>
                    <option>No bow</option>
                <?php else:?>
                    <?php
                    foreach ($arcs as $arc):?>
                        <option value="<?=$arc['ID_ARC'];?>"><?=$arc['NOMARC'];?></option>
                    <?php endforeach;?>
                <?php endif;?>
            </select>
        </div>
        <div id="blasonsField">
            <h3>Blasons</h3>
            <select name="blasons" id="sources" class="custom-select sources" placeholder="Source Type">
                <?php
                if(count($blasons) == 0):?>
                <option>No blason</option>
                <?php else:?>
                <?php
                foreach ($blasons as $blason):?>
                <option value="<?=$blasons['ID_BLAS'];?>"><?=$blasons['NOMBLAS'];?></option>
                <?php endforeach;?>
                <?php endif;?>
            </select>
        </div>
        <div id="serieField">
            <h3>Series</h3>
            <input type="number" name="sets" id="serieInput" min = "1" max="3" placeholder="1">
        </div>
        <div id="arrowField">
            <h3>Arrows</h3>
            <input type="number" name="arrows" id="arrowInput" min = "1" max="10" placeholder="1">
        </div>
        <div id="volleyField">
            <h3>Volleys</h3>
            <input type="number" name="volleys" id="volleyInput" min = "1" max="6" placeholder="1">
        </div>
        <input type="submit" name="submitBtn" id="submitBtn" value="Let's practice !">
    </form>
</div>
<script>
    let rightBtn = document.getElementById("right-btn");
    rightBtn.disabled = false;
    console.log(rightBtn);
    rightBtn.addEventListener('touchend', function () {
        window.location = "<?= $left_url;?>";
    });
</script>