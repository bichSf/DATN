let defaultData = [0,0,0,0,0,0];
var chartWeight;
var chartHeight;
var chartSdd;
var demoChart = (function () {
    let modules = {};

    modules.buildChart2 = function () {
        Highcharts.chart('id-chart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Biểu đồ cân nặng theo tuổi'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Tỷ lệ',
                colorByPoint: true,
                data: [{
                    name: 'Phát triển bình thường',
                    y: 61.41,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Suy dinh dưỡng độ I',
                    y: 11.84
                }, {
                    name: 'Suy dinh dưỡng độ II',
                    y: 10.85
                }, {
                    name: 'Suy dinh dưỡng độ III',
                    y: 4.67
                }, {
                    name: 'Thừa cân độ I',
                    y: 4.18
                }, {
                    name: 'Thừa cân độ II',
                    y: 7.05
                }]
            }]
        });

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

    modules.buildChart = function () {
        modules.buildLineChart();
        modules.buildColumnChart();
        modules.buildLineChartWeight();
    }

    modules.buildLineChart = function () {
        let data = new FormData();
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        let submitAjax = $.ajax({
            type: "POST",
            url: '/statistical/get-zscore',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            Common.buildLineChart('id-chart-2', response.data);
        });

        submitAjax.fail(function (response) {
            // $("#import-info").html('プロフィールを保存する');
            // $('#import-info').attr("disabled", false);
            // let messageList = response.responseJSON.errors;
            // profileUser.showMessageValidate(messageList);
        });
    }

    modules.buildColumnChart = function () {
        let data = new FormData();
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        data.append("table_type", $('#select-column-chart').val());
        let submitAjax = $.ajax({
            type: "POST",
            url: '/statistical/get-column-chart',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            chartSdd = Common.buildColumnChart('id-chart-sdd', response.data);
        });

        submitAjax.fail(function (response) {
        });
    }

    modules.buildLineChartWeight = function () {
        let data = new FormData();
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        data.append("type", 'weight');
        let submitAjax = $.ajax({
            type: "GET",
            url: '/statistical/get-avg-weight-height',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            chartWeight = Common.buildLineChartWeight('id-chart-weight', 'Cân nặng trung bình (kg) người trưởng thành qua các năm',
                'Cân nặng trung bình', response.weight, 'kg');
            chartHeight = Common.buildLineChartWeight('id-chart-height', 'Chiều cao trung bình (cm) người trưởng thành qua các năm',
                'Chiều cao trung bình', response.height, 'cm');
        });

        submitAjax.fail(function (response) {
        });

        setTimeout(modules.liveDataWeightHeightChart, 2000)
    }

    modules.liveDataWeightHeightChart =  async function() {
        const result = await fetch(window.origin + '/statistical/get-avg-weight-height');
        if (result.ok) {
            const data = await result.json();
            chartWeight.series[0].setData(data['weight']['data'][0]['data']);
            chartWeight.series[1].setData(data['weight']['data'][1]['data']);
            chartHeight.series[0].setData(data['height']['data'][0]['data']);
            chartHeight.series[1].setData(data['height']['data'][1]['data']);
            setTimeout(modules.liveDataWeightHeightChart, 3000);
        }
    }

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    demoChart.buildChart();
    $('#select-column-chart').on('change', function () {
        demoChart.buildColumnChart();
    })
});
