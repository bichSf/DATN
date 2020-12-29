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
        Common.buildSpiderChart('id-spider-chart', 'Hiện trạng & trung bình', defaultDataSpiderChart)
        Highcharts.chart('id-chart-5', {
            chart: {
                type: 'column'
            },
            title: {
                text: ' Tỷ lệ SDD của trẻ dưới 5 tuổi qua các năm'
            },
            // subtitle: {
            //     text: 'Source: WorldClimate.com'
            // },
            xAxis: {
                categories: ['SDD thấp còi', 'SDD nhẹ cân', 'SDD gày còm'],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Tỷ lệ (%)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                // column: {
                //     pointPadding: 0.2,
                //     borderWidth: 0
                // }
            },
            series: [{
                name: '2000',
                data: [50, 45, 40],
                color:'#0066ff'

            }, {
                name: '2002',
                data: [40, 32, 28],
                color:'#3385ff'
            }, {
                name: '2005',
                data: [38, 30, 25],
                color:'#66a3ff'
            }, {
                name: '2008',
                data: [35, 28, 23],
                color:'#99c2ff'
            }, {
                name: '2010',
                data: [32, 24, 18],
                color:'#cce0ff'
            }]
        });
    };

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
            Common.buildSpiderChart('id-spider-chart', 'Hiện trạng & trung bình', response)
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

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    simulation.buildChart();
    simulation.showInput();

    $('select[name=table_type]').on('change', function () {
        simulation.showInput();
    });

    $('#btn-see-results').on('click', function () {
        simulation.seeResults();
    })
});
