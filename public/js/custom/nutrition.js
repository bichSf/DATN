let nutritionFunction = (function () {
    let modules = {};


    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    $('select[name=table_type]').on('change', function () {
        $('#form-statistical-population').submit();
    })
});
