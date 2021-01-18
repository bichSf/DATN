let changePassword = (function () {
    let modules = {};

    modules.saveData = function () {
        let data = new FormData($('#form-change-password')[0]);
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));

        let submitAjax = $.ajax({
            type: "POST",
            url: '/change-password/update',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            if (response.passwordFail) {
                $('#btn-change-password').attr("disabled", false);
                $('#form-change-password').find('[data-error=old_password]').text('Password hiện tại không đúng!');
                $('#form-change-password').find(`[name=old_password]`).addClass('error')
            } else if (response.save) {
                window.location.href = '/change-password'
            } else {
                window.location.reload();
            }
        });

        submitAjax.fail(function (response) {
            if (response.status === 422) {
                $('#btn-change-password').attr("disabled", false);
                Common.showMessage($('#form-change-password'), response.responseJSON.errors);
            }
        });
    };

    return modules;
}());

$(document).ready(function(){
    $('#btn-change-password').on('click', function () {
        $('#btn-change-password').attr("disabled", true);
        Common.clearData($('#form-change-password'));
        changePassword.saveData();
    })
});
