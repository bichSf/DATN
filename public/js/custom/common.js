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


    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    Common.optionDateTime();
    Common.cleaveNumeral();
});
