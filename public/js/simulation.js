let defaultData = [0,0,0,0,0,0];

var simulation = (function () {
    let modules = {};

    modules.buildChart = function () {
        // Highcharts.chart('id-chart', {
        //     chart: {
        //         plotBackgroundColor: null,
        //         plotBorderWidth: null,
        //         plotShadow: false,
        //         type: 'pie'
        //     },
        //     title: {
        //         text: 'Biểu đồ cân nặng theo tuổi'
        //     },
        //     tooltip: {
        //         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        //     },
        //     accessibility: {
        //         point: {
        //             valueSuffix: '%'
        //         }
        //     },
        //     exporting: {
        //         enabled: false
        //     },
        //     credits: {
        //         enabled: false
        //     },
        //     plotOptions: {
        //         pie: {
        //             allowPointSelect: true,
        //             cursor: 'pointer',
        //             dataLabels: {
        //                 enabled: false
        //             },
        //             showInLegend: true
        //         }
        //     },
        //     series: [{
        //         name: 'Tỷ lệ',
        //         colorByPoint: true,
        //         data: [{
        //             name: 'Phát triển bình thường',
        //             y: 61.41,
        //             sliced: true,
        //             selected: true
        //         }, {
        //             name: 'Suy dinh dưỡng độ I',
        //             y: 11.84
        //         }, {
        //             name: 'Suy dinh dưỡng độ II',
        //             y: 10.85
        //         }, {
        //             name: 'Suy dinh dưỡng độ III',
        //             y: 4.67
        //         }, {
        //             name: 'Thừa cân độ I',
        //             y: 4.18
        //         }, {
        //             name: 'Thừa cân độ II',
        //             y: 7.05
        //         }]
        //     }]
        // });
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

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    simulation.buildChart();
});
