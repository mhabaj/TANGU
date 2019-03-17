/*function createInputField(number = 1, datatype="string", label, min, max, restriction="text", form, placeholder = "", tiny = false) {
    let divElement = document.createElement('div'),
        inputElement = document.createElement('input'),
        labelElement = document.createElement('h3');


    if(tiny) {
        divElement.classList.add('tiny-div-field');
        inputElement.classList.add('tiny-input-field');
    } else {
        divElement.classList.add('div-field');
        inputElement.classList.add('input-field');
    }
    labelElement.classList.add('title-field');

    inputElement.type = restriction;
    labelElement.innerText = label;
    divElement.appendChild(labelElement);
    divElement.appendChild(inputElement);
    form.appendChild(divElement);

    let elements = [divElement, inputElement, labelElement];
    return elements;
}*/

function createInputFields(param, tiny, form) {
    if(param.length == 2 & tiny) {
        let elements = [];
        var i;
        let inputsBox = document.createElement('div');
        inputsBox.classList.add('tiny-div-field');

        for(i = 0; i < param.length; i++) {
            let input = param[i];
            let inputElement = document.createElement('input'),
                label = document.createElement('h3'),
                div = document.createElement('div');
            let subDivClass = "sub-div-field-" + (i+1);

            inputElement.type = input.restriction;
            inputElement.placeholder = input.placeholder;
            //inputElement.autocomplete = input.autocomplete;
            label.innerText = input.label;

            label.classList.add('title-field');
            inputElement.classList.add('tiny-input-field');
            div.classList.add(subDivClass);

            div.appendChild(label);
            div.appendChild(inputElement);
            inputsBox.appendChild(div);

            elements.push([label, inputElement, div]);
        }
        elements.push([inputsBox]);
        form.appendChild(inputsBox);
        return elements;
    } else {
        let elements = [];
        var i;

        for(i = 0; i < param.length; i++) {
            let input = param[i];
            let divElement = document.createElement('div'),
                inputElement = document.createElement('input'),
                labelElement = document.createElement('h3');

            inputElement.type = input.restriction;
            labelElement.innerText = input.label;

            divElement.classList.add('div-field');
            inputElement.classList.add('input-field');
            labelElement.classList.add('title-field');

            divElement.appendChild(labelElement);
            divElement.appendChild(inputElement);
            form.appendChild(divElement);
            elements.push([labelElement, inputElement, divElement]);
        }

        return elements;
    }
}

function activateValidationHandler(elements, min, max, check = false) {
    function errorDisplay(field) {
        field.style.borderColor = "rgba(255, 59, 48, 1)";
    }

    function successDisplay(field) {
        field.style.borderColor = "rgba(76, 217, 100, 1)";
    }

    if(elements.length > 0 && !check) {
        var i;
        for(i = 0; i < elements.length; i++) {
            let currentElem = elements[i];

            currentElem.addEventListener('input', function() {
                if(currentElem.value.length < min || currentElem.value.length > max) {
                    errorDisplay(currentElem);
                } else {
                    successDisplay(currentElem);
                }
            });
        }

    } else if (elements.length == 2 && check) {
        let check = [];

        elements[0].addEventListener('input', function() {
            if(elements[0].value.length < min || elements[0].value.length > max) {
                errorDisplay(elements[0]);
                check[0] = false;
            } else {
                successDisplay(elements[0]);
                check[0] = true;

            }

            elements[1].addEventListener('input', function() {
                if(elements[1].value != elements[0].value) {
                    errorDisplay(elements[0]);
                    errorDisplay(elements[1]);
                    check[1] = false;
                } else {
                    successDisplay(elements[0]);
                    successDisplay(elements[1]);
                    check[1] = true;
                }
            });
        });
    }
}