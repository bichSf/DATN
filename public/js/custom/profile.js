let Profile = (function () {
    let modules = {};

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    $('.btn-profile-create').on('click', function () {
        $(this).attr("disabled", true);
    });
});
