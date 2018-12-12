<div class="container-fluid" id="mainBox">
    <div id="title">
        <p id="serieText"></p>
        <p id="voleeText"></p>
    </div>
    <div id="target">
        <div id="target1"></div>
        <div id="subTarget1"></div>
        <div id="target2"></div>
        <div id="subTarget2"></div>
        <div id="target3"></div>
        <div id="subTarget3"></div>
        <div id="target4"></div>
        <div id="subTarget4"></div>
        <div id="target5"></div>
        <div id="subTarget5"></div>
        <div id="subTarget6"></div>
    </div>
</div>

<script>
    var target1 = document.getElementById('target1'),
        target2 = document.getElementById('target2'),
        target3 = document.getElementById('target3'),
        target4 = document.getElementById('target4'),
        target5 = document.getElementById('target5'),
        subTarget1 = document.getElementById('subTarget1'),
        subTarget2 = document.getElementById('subTarget2'),
        subTarget3 = document.getElementById('subTarget3'),
        subTarget4 = document.getElementById('subTarget4'),
        subTarget5 = document.getElementById('subTarget5'),
        subTarget6 = document.getElementById('subTarget6');

    var serieText = document.getElementById('serieText'),
        voleeText = document.getElementById('voleeText');

    var nbrSeries = 2,
        nbrVolees = 3,
        nbrTirs = 5,
        countSeries = 1,
        countVolees = 1,
        countTirs = 0;

    var checkEvents = false;

    function target1Handler() {
        if(countTirs >= nbrTirs) {
            if(countVolees >= nbrVolees) {
                if(countSeries >= nbrSeries) {
                    console.log('Fin de entrainement');
                } else {
                    countVolees = 0;
                    countSeries++;
                }
            } else {
                countTirs = 0;
                countVolees++;
            }
        } else {
            countTirs++;
            serieText.innerHTML = "Serie " + countSeries;
            voleeText.innerHTML = "Volee " + countVolees;
            console.log('Serie ' + countSeries + ' Volee '+ countVolees  + ' Tir ' + countTirs);
        }
    }

    function target2Handler() {
        if(countTirs >= nbrTirs) {
            check = true;
            target2.removeEventListener('touchstart', target2Handler);
        } else {
            countTirs++;
            console.log('target2');
        }
    }

    function target3Handler() {
        if(countTirs >= nbrTirs) {
            check = true;
            target3.removeEventListener('touchstart', target3Handler);
        } else {
            countTirs++;
            console.log('target3');
        }
    }

    function target4Handler() {
        if(countTirs >= nbrTirs) {
            check = true;
            target4.removeEventListener('touchstart', target4Handler);
        } else {
            countTirs++;
            console.log('target4');
        }
    }

    function target5Handler() {
        if(countTirs >= nbrTirs) {
            check = true;
            target5.removeEventListener('touchstart', target5Handler);
        } else {
            countTirs++;
            console.log('target5');
        }
    }

    function subTarget1Handler() {
        if(countTirs >= nbrTirs) {
            check = true;
            subTarget1.removeEventListener('touchstart', subTarget1Handler);
        } else {
            countTirs++;
            console.log('subtarget1');
        }
    }

    function subTarget2Handler() {
        if(countTirs >= nbrTirs) {
            check = true;
            subTarget2.removeEventListener('touchstart', subTarget2Handler);
        } else {
            countTirs++;
            console.log('subtarget2');
        }
    }

    function subTarget3Handler() {
        if(countTirs >= nbrTirs) {
            check = true;
            subTarget3.removeEventListener('touchstart', subTarget3Handler);
        } else {
            countTirs++;
            console.log('subtarget3');
        }
    }

    function subTarget4Handler() {
        if(countTirs >= nbrTirs) {
            check = true;
            subTarget4.removeEventListener('touchstart', subTarget4Handler);
        } else {
            countTirs++;
            console.log('subtarget4');
        }
    }

    function subTarget5Handler() {
        if(countTirs >= nbrTirs) {
            check = true;
            subTarget5.removeEventListener('touchstart', subTarget5Handler);
        } else {
            countTirs++;
            console.log('subtarget5');
        }
    }

    function subTarget6Handler() {
        if(countTirs >= nbrTirs) {
            check = true;
            subTarget6.removeEventListener('touchstart', subTarget6Handler);
        } else {
            countTirs++;
            console.log('subtarget6');
        }
    }


    function launchEvents() {
        target1.addEventListener('touchstart', target1Handler);
        /*target2.addEventListener('touchstart', target2Handler);
        target3.addEventListener('touchstart', target3Handler);
        target4.addEventListener('touchstart', target4Handler);
        target5.addEventListener('touchstart', target5Handler);

        subTarget1.addEventListener('touchstart', subTarget1Handler);
        subTarget2.addEventListener('touchstart', subTarget2Handler);
        subTarget3.addEventListener('touchstart', subTarget3Handler);
        subTarget4.addEventListener('touchstart', subTarget4Handler);
        subTarget5.addEventListener('touchstart', subTarget5Handler);
        subTarget6.addEventListener('touchstart', subTarget6Handler);*/
    }

launchEvents();

</script>