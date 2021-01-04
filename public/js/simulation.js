let defaultData = [0,0,0,0,0,0];
let defaultDataSpiderChart = {
    categories: ['Cân nặng', 'Chiều cao', 'Vòng đầu'],
    data: [
        {
            name: 'Hiện trạng',
            data: [2, 30, 15]
        },
        {
            name: 'Trung bình',
            data: [2.5, 30.5, 15.5]
        }
    ]
}
let arrayInput = ['weight', 'height', 'head_circumference', 'biceps_skinfold', 'arm_circumference', 'chest_circumference', 'fat_percentage', 'knee_height', 'stomach_feet'];
var simulation = (function () {
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

    modules.buildChart = function () {
        Common.buildSpiderChart('id-spider-chart', 'Hiện trạng & trung bình', defaultDataSpiderChart);
        modules.buildMultipleColumnChart();
    };

    modules.buildMultipleColumnChart = function () {
        let data = new FormData();
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        data.append("area", $('select[name=area]').val());
        data.append("table_type", $('select[name=table_type]').val());
        Common.convertNumeralForForm(data);
        let submitAjax = $.ajax({
            type: "POST",
            url: window.origin + '/malnutrition-rate',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            Common.buildMultipleColumnChart('id-multiples-column-chart', 'Tình trạng cân nặng các năm gần đây', response)
        });

        submitAjax.fail(function (response) {

        })
    }

    modules.seeResults = function () {
        let data = new FormData($('#form-data')[0]);
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        Common.convertNumeralForForm(data);
        let submitAjax = $.ajax({
            type: "POST",
            url: window.origin + '/see-results',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            $('body').find('p.error-message').css('padding-top', 0).hide();
            $("body").find('input').removeClass('input-error');
            $("body").find('select').parent().removeClass('input-error');
            Common.buildSpiderChart('id-spider-chart', 'Hiện trạng & trung bình', response);
            modules.renderDataDetail(response.data_detail);
        });

        submitAjax.fail(function (response) {
            let messageList = response.responseJSON.errors;
            modules.showMessageValidate(messageList);
            $('#btn-create-data').prop("disabled", false);
        })
    }

    modules.showMessageValidate = function (messageList) {
        $('body').find('p.error-message').css('padding-top', 0).hide();
        $("body").find('input').removeClass('input-error');
        $("body").find('select').parent().removeClass('input-error');
        $.each(messageList, function (key, value) {
            $('p.error-message[data-error=' + key + ']').text(value).css('padding-top', 4).show();
            $('input[name=' + key + ']').addClass('input-error');
            $('select[name=' + key + ']').addClass('input-error');
        });
        $('html, body').animate({
            scrollTop: (
                $(document).find('p.error-message[data-error=' + Object.keys(messageList)[0] + ']').offset().top - 300
            )
        }, 0);
    };

    modules.renderDataDetail = function (data) {
        $('#z-score').html(data.z_score);
        $('#z-bmi-status').html(data.z_bmi_status);
        $('#bmi').html(data.bmi);
        $('#weight-ideal').html(data.weight_ideal.min + ' Kg ~ ' + data.weight_ideal.max + ' Kg');
    }

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    simulation.buildChart();
    simulation.showInput();

    $('select[name=table_type]').on('change', function () {
        simulation.showInput();
        simulation.buildMultipleColumnChart();
    });

    $('select[name=area]').on('change', function () {
        simulation.buildMultipleColumnChart();
    });

    $('#btn-see-results').on('click', function () {
        simulation.seeResults();
    });
});
