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
let areaName = {1: 'Miền Bắc', 2: 'Miền Nam', 3: 'Miền Trung'};

let arrayInput = ['weight', 'height', 'head_circumference', 'biceps_skinfold', 'arm_circumference', 'chest_circumference', 'fat_percentage', 'knee_height', 'stomach_feet'];
let statisticNutritionFunction = (function () {
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
    };

    modules.setSelectDistrict = function () {
        let provinceIds = $('select[name=province_id]').val();
        $('select[name=district_id]').html(`<option value="">Quận/ Huyện</option>`);
        $.each(arr[provinceIds], function (key, value) {
            $('select[name=district_id]').append(`<option value="`+key+`">`+value+`</option>`);
        });
    };

    modules.saveData = function () {
        let data = new FormData($('#form-create-data')[0]);
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        Common.convertNumeralForForm(data);
        let submitAjax = $.ajax({
            type: "POST",
            url: window.origin + '/nutrition/store',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            window.location.href = window.origin + '/nutrition';
        });

        submitAjax.fail(function (response) {
            Common.showMessage($('#form-create-data'), response.responseJSON.errors);
            $('#btn-create-data').prop("disabled", false);
        })
    };

    modules.getSurvey = function () {
        let data = new FormData();
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        data.append("survey_id", $('select[name=survey_id]').val());
        let submitAjax = $.ajax({
            type: "POST",
            url: window.origin + '/nutrition/get-survey',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            $('input[name=year]').val(response.data.year);
            $('input[name=month]').val(response.data.month);
            $('input[name=area_id]').attr('data-id' , response.data.area_id);
            $('input[name=area_id]').val(areaName[response.data.area_id]);
        });
    };

    modules.checkCsv = function () {
        let data = new FormData($('#form-csv')[0]);
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        let submitAjax = $.ajax({
            type: "POST",
            url: window.origin + '/nutrition/check-csv',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            $('#table-show-csv').html(response)
        });
    };

    modules.prevent = function (event) {
        event.preventDefault();
        event.stopPropagation()
    };

    modules.getProvince = function (area_id) {
        let data = new FormData();
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        data.append("area_id", area_id);
        let submitAjax = $.ajax({
            type: "POST",
            url: window.origin + '/nutrition/get-province',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            $('select[name=province_id]').html(`<option value="">Tỉnh/ Thành phố</option>`)
            $.each(response.provinces, function (key, value) {
                $('select[name=province_id]').append(`<option value="`+value.id+`">`+value.name+`</option>`)
            })
        });

        submitAjax.fail(function (response) {
        })
    };

    modules.getDistrict = function (province_id) {
        let data = new FormData();
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        data.append("province_id", province_id);
        let submitAjax = $.ajax({
            type: "POST",
            url: window.origin + '/nutrition/get-district',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            $('select[name=district_id]').html(`<option value="">Quận/ Huyện</option>`)
            $.each(response.districts, function (key, value) {
                $('select[name=district_id]').append(`<option value="`+value.id+`">`+value.name+`</option>`)
            })
        });

        submitAjax.fail(function (response) {
        })
    };

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    statisticNutritionFunction.showInput();

    $('select[name=table_type]').on('change', function () {
        statisticNutritionFunction.showInput();
    });

    $('#btn-create-data').on('click', function () {
        $(this).attr("disabled", true);
        statisticNutritionFunction.saveData();
    });

    $('select[name=survey_id]').on('change', function () {
        statisticNutritionFunction.getSurvey();
        setTimeout(function () {
            statisticNutritionFunction.getProvince($('input[name=area_id]').attr('data-id'));
        },300)
    });

    $('select[name=province_id]').on('change', function () {
        statisticNutritionFunction.getDistrict($(this).val());
    });

    $('#choose-file').on('click', function () {
        $('#input-csv').click()
    });

    $('#input-csv').on('change', function (event) {
        statisticNutritionFunction.prevent(event)
        let files = event.target.files || event.originalEvent.dataTransfer.files;
        if (files.length === 0) {
            $(this).val('');
            $('#show-file-name').val('')
            $('#table-show-csv').html(`<table class="table table-bordered table-striped border-0 m0">
                        <thead>
                        <tr>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>`)
            return
        }
        $('#show-file-name').val(files[0].name);
        statisticNutritionFunction.checkCsv();
    });

    $('#down-csv').on('click', function () {
        $('#form-down-csv').submit();
    });

    $('#post-data-csv').on('click', function () {
        $('#form-csv').submit();
    });

    $('#csv-table-type').on('change', function () {
        $('#input-table-type').val($(this).val())
    });
});
