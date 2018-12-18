<div class="container-fluid addTraining" id="mainBox">
    <?php include 'includes/back-header.php';?>
    <form method="get" action="currentTraining.php" id="newTrainingForm">
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
            <select name="bows" id="bowInput" class="custom-select sources" placeholder="Source Type">
                <?php
                if(count($arcs) == 0):?>
                    <option value="null" disabled>No bow</option>
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
            <select name="blasons" id="blasonInput" class="custom-select sources" placeholder="Source Type">
                <?php
                if(count($blasons) == 0):?>
                <option value="null" disabled>No blason</option>
                <?php else:?>
                <?php
                foreach ($blasons as $blason):?>
                <option value="<?=$blason['ID_BLAS'];?>"><?=$blason['NOMBLAS'];?></option>
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

    rightBtn.addEventListener('touchend', function () {
        window.location = "<?= $left_url;?>";
    });

    let submitBtn = document.getElementById("submitBtn");

    let nameInput = document.getElementById("nameInput"),
        locationInput = document.getElementById("locationInput"),
        dateInput = document.getElementById("dateInput"),
        distanceInput = document.getElementById("distanceInput"),
        bowInput = document.getElementById("bowInput"),
        blasonInput = document.getElementById("blasonInput"),
        serieInput = document.getElementById("serieInput"),
        volleyInput = document.getElementById("volleyInput"),
        arrowInput = document.getElementById("arrowInput");

    let nameLength = nameInput.value.length,
        locationLength = locationInput.value.length,
        dateLength = dateInput.value.length,
        distanceLength = distanceInput.value.length,
        bowLength = bowInput.value.length,
        blasonLength = blasonInput.value.length,
        serieLength = serieInput.value.length,
        volleyLength = volleyInput.value.length,
        arrowLength = arrowInput.value.length;

    let inputs = [nameInput, locationInput, dateInput, distanceInput, bowInput, blasonInput, serieInput, volleyInput, arrowInput];


    /*
    nameInput.addEventListener('input', function () {
        if(!(nameLength == 0 || locationLength == 0 || dateLength == 0 || distanceLength == 0 || bowLength == 0 || blasonLength == 0 || serieLength == 0 || volleyLength == 0 || arrowLength == 0)) {
            submitBtn.disabled = false;
            submitBtn.style.opacity = "1";
        }
    });

    locationInput.addEventListener('input', function () {
        if(!(nameLength == 0 || locationLength == 0 || dateLength == 0 || distanceLength == 0 || serieLength == 0 || volleyLength == 0 || arrowLength == 0)) {
            submitBtn.disabled = false;
            submitBtn.style.opacity = "1";
        }
    });

    */

</script>