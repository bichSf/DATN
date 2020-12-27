let defaultData = [0,0,0,0,0,0];
var chartWeight;
var chartHeight;
var chartSdd;
var chartZscore;
var zscoreTimeOut;
var demoChart = (function () {
    let modules = {};

    modules.buildChart2 = function () {

    };

    modules.buildChart = function () {
        modules.buildLineChart();
        modules.buildPieChart();
        modules.buildColumnChart();
        modules.buildLineChartWeight();
    }

    modules.buildPieChart = function () {
        let data = new FormData();
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        data.append("year", $('#change-pie').val());
        let submitAjax = $.ajax({
            type: "POST",
            url: '/statistical/get-data-bmi',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            Common.buildPieChart('id-chart-pie', 'Phân loại tình trạng cân nặng theo BMI', response.data)
        });

        submitAjax.fail(function (response) {

        });
    }
    modules.buildLineChart = function () {
        let data = new FormData();
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        data.append("table_type", $('#select-zcore-chart').val());
        data.append("year_1", $('select[name=year_1]').val());
        data.append("year_2", $('select[name=year_2]').val());
        let submitAjax = $.ajax({
            type: "POST",
            url: '/statistical/get-zscore',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            chartZscore = Common.buildLineChart('id-chart-zscore', response.data);
        });

        submitAjax.fail(function (response) {
        });

        modules.liveDataZscoreChart();

    }

    modules.liveDataZscoreChart =  async function() {
        const result = await fetch(window.origin + '/statistical/get-zscore?table_type=' + $('#select-zcore-chart').val() + '&year_1=' + $('select[name=year_1]').val() + '&year_2=' + $('select[name=year_2]').val());
        if (result.ok) {
            const data = await result.json();
            chartZscore.series[0].setData(data['data']['data']['0']['data']);
            chartZscore.series[1].setData(data['data']['data']['1']['data']);
            zscoreTimeOut = setTimeout(modules.liveDataZscoreChart, 3000);
        }
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

        modules.liveDataWeightHeightChart();
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
    });

    $('.change-zscore').on('change', function () {
        clearTimeout(zscoreTimeOut);
        demoChart.buildLineChart();
    });

    $('#change-pie').on('change', function () {
        demoChart.buildPieChart();
    })
});
