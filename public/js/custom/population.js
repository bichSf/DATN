let inputWeight = $('input[name=weight]');
let inputHeight = $('input[name=height]');
let inputHeadCircumference = $('input[name=head_circumference]');
let inputBicepsSkinfold = $('input[name=biceps_skinfold]');
let inputArmCircumference = $('input[name=arm_circumference]');
let inputChestCircumference = $('input[name=chest_circumference]');
let inputFatPercentage = $('input[name=fat_percentage]');
let inputKneeHeight = $('input[name=knee_height]');
let inputStomachFeet = $('input[name=stomach_feet]');

let rowInputWeight = inputWeight.parent().parent().parent();
let rowInputHeight = inputHeight.parent().parent().parent();
let rowInputHeadCircumference = inputHeadCircumference.parent().parent().parent();
let rowInputBicepsSkinfold = inputBicepsSkinfold.parent().parent().parent();
let rowInputArmCircumference = inputArmCircumference.parent().parent().parent();
let rowInputChestCircumference = inputChestCircumference.parent().parent().parent();
let rowInputFatPercentage = inputFatPercentage.parent().parent().parent();
let rowInputKneeHeight = inputKneeHeight.parent().parent().parent();
let rowInputStomachFeet = inputStomachFeet.parent().parent().parent();

let arrayInput = ['weight', 'height', 'head_circumference', 'biceps_skinfold', 'arm_circumference', 'chest_circumference', 'fat_percentage', 'knee_height', 'stomach_feet'];
let populationFunction = (function () {
    let modules = {};

    modules.showInput = function () {
        let typeTable = $('select[name=table_type]').val();
        switch (typeTable) {
            case "infants_0_0":
                modules.showHiddenInput(['weight', 'height', 'head_circumference']);
                break;
            case "toddlers_1_60":
                modules.showHiddenInput(['weight', 'height', 'biceps_skinfold', 'arm_circumference']);
                break;
            case "children_5_11":
                modules.showHiddenInput(['weight', 'height', 'biceps_skinfold', 'arm_circumference', 'head_circumference', 'chest_circumference']);
                break;
            case "teens_11_20":
                modules.showHiddenInput(['weight', 'height', 'biceps_skinfold', 'fat_percentage']);
                break;
            case "adults_20_60":
                modules.showHiddenInput(['weight', 'height', 'arm_circumference', 'biceps_skinfold', 'fat_percentage']);
                break;
            case "seniors_60_100":
                modules.showHiddenInput(['weight', 'height', 'arm_circumference', 'biceps_skinfold', 'knee_height', 'stomach_feet']);
                break;

        }
    };

    modules.showHiddenInput = function ($array) {
        $.each(arrayInput, function (key, value)  {
            if ($array.includes(value)) {
                $('input[name='+value+']').parent().parent().parent().show();
            } else {
                $('input[name='+value+']').parent().parent().parent().hide();
            }
        })
    }

    modules.setSelectProvincial = function () {
        $.each(c, function (key, value) {
           $('select[name=provincial]').append(`
                <option value="`+key+`">`+value+`</option>
           `);
        });
    }

    modules.setSelectDistrict = function () {
        let idProvincial = $('select[name=provincial]').val();
        $('select[name=district]').html(`
                  <option value="">Quận/ Huyện</option>
           `);
        $.each(arr[idProvincial], function (key, value) {
            $('select[name=district]').append(`
                <option value="`+key+`">`+value+`</option>
           `);
        });
    }


    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    populationFunction.showInput();
    populationFunction.setSelectProvincial();

    $('select[name=table_type]').on('change', function () {
        populationFunction.showInput();
    });

    $('select[name=provincial]').on('change', function () {
        populationFunction.setSelectDistrict();
    });
})
