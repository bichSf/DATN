let defaultData = [0,0,0,0,0,0];

var demoChart1 = (function () {
    let modules = {};

    modules.buildChart = function () {
        Highcharts.chart('id-chart-3', {
            chart: {
                polar: true,
                type: 'line'
            },

            title: {
                text: 'Hiện trạng & Trung bình',
                // x: -80
            },

            pane: {
                size: '80%'
            },

            xAxis: {
                categories: ['Chiều cao', 'Cân nặng', 'Vòng cánh tay', 'Vòng đầu',
                    'Vòng ngực', 'Nếp gấp da ở cơ tam đầu'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },

            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0
            },

            tooltip: {
                shared: true,
                pointFormat: '<span style="color:{series.color}">{series.name}: <b>${point.y:,.0f}</b><br/>'
            },

            legend: {
                align: 'right',
                verticalAlign: 'middle',
                layout: 'vertical'
            },

            series: [{
                name: 'Trung bình',
                data: [43000, 19000, 60000, 35000, 17000, 10000],
                pointPlacement: 'on'
            }, {
                name: 'Hiện trạng',
                data: [50000, 39000, 42000, 31000, 26000, 14000],
                pointPlacement: 'on'
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            align: 'center',
                            verticalAlign: 'bottom',
                            layout: 'horizontal'
                        },
                        pane: {
                            size: '70%'
                        }
                    }
                }]
            }

        });
    };

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    demoChart1.buildChart();
});
