<div class="container-fluid" id="mainBox">
    <?php include 'includes/back-header.php' ;?>
    <form method="POST" enctype="multipart/form-data" id="myPost">

    </form>
</div>
<script>
    let form = document.getElementById('myPost');


    let param = [
        {
            datatype: "string",
            label: "test",
            min: 0,
            max: 15,
            restriction: "text",
            placeholder: "",
            autocomplete: "off"
        },
        {
            datatype: "string",
            label: "ano",
            min: 0,
            max: 15,
            restriction: "password",
            placeholder: "",
            autocomplete: "off"
        }
    ];
    let elements = createInputFields(param, false, form),
        input1 = elements[0][1],
        input2 = elements[1][1];

    let inputs = [input1, input2];

    activateValidationHandler(inputs, 0, 20, true);


</script>