let Common = (function () {
    let modules = {};

    modules.optionDateTime = function () {
        $('.date-time').datepicker({
            format: 'yyyy-mm-dd',
            language: "vi",
            forceParse: true,
            useCurrent: false,
        });
    };

    modules.cleaveNumeral = function () {
        $("body").find('.convert-data').each(function (i, e) {
            new Cleave($(this), {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });
        })
    };

    modules.convertNumeralForForm =function($formData) {
        $("body").find('.convert-data').each(function (i, e) {
            let price = $(this).val();
            if (price == "") {
                $formData.append($(this).prop('name'), 0);
            } else {
                price = price.split(",").join("");
                $formData.append($(this).prop('name'), price);
            }
        });
    };

    modules.showMessage = function ($form, errors) {
        $.each(errors, function (key, value) {
            $form.find(`[data-error='${key}']`).text(value);
            $form.find(`[name='${key}']`).addClass('input-error');
        })
    };

    modules.clearData = function ($form) {
        $form.find('input').removeClass('input-error');
        $form.find('select').removeClass('input-error');
        $form.find($('.error-message')).text('');
    };

    modules.buildLineChart = function (idDiv, data) {
        return Highcharts.chart(idDiv, {

            chart: {
                type: 'spline'
            },

            title: {
                text: 'Đường cong phân bố cân-theo-cao z-score'
            },

            yAxis: {
                title: {
                    text: 'Tỷ lệ (%)'
                }
            },

            xAxis: {
                categories: data.categories,
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            legend: {
                // layout: 'vertical',
                // align: 'right',
                // verticalAlign: 'middle'
            },

            plotOptions: {
                spline: {
                    lineWidth: 4,
                    states: {
                        hover: {
                            lineWidth: 5
                        }
                    },
                    marker: {
                        enabled: false
                    }
                }
            },

            series: data.data,

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    }

    modules.buildColumnChart = function (idDiv, data) {
        return Highcharts.chart(idDiv, {
            chart: {
                type: 'column'
            },
            title: {
                text: ' Tỷ lệ suy dinh dưỡng của trẻ qua các năm gần đây'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Tỷ lệ (%)'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b>'
            },

            series: [
                {
                    colorByPoint: true,
                    data: data
                }
            ]
        });
    }

    modules.buildLineChartWeight = function (idDiv, title, titleY, data, donvi) {
        return Highcharts.chart(idDiv, {
            chart: {
                polar: true,
                type: 'line'
            },
            title: {
                text: title,
                // x: -80
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            pane: {
                size: '80%'
            },
            xAxis: {
                categories: data.categories,
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                title: {
                    text: titleY
                },
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0
            },
            tooltip: {
                shared: true,
                pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.2f} ('+donvi+')</b><br/>'
            },
            legend: {
                align: 'right',
                verticalAlign: 'middle',
                layout: 'vertical'
            },
            series: data.data,
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
    }

    modules.buildPieChart = function (idDiv, title, data) {
        return Highcharts.chart(idDiv, {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: title
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
                data: data
            }]
        });
    }

    modules.buildSpiderChart = function (idDiv, title, data) {
        console.log(data)
        return Highcharts.chart(idDiv, {
            chart: {
                polar: true,
                type: 'line'
            },

            title: {
                text: title,
                // x: -80
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            pane: {
                size: '80%'
            },

            xAxis: {
                categories: data.categories,
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
                pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y}</b><br/>'
            },

            legend: {
                align: 'right',
                verticalAlign: 'middle',
                layout: 'vertical'
            },

            series: data.data,

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
    }

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    Common.optionDateTime();
    Common.cleaveNumeral();
});
