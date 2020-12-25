let $inputAvatar = $('input[name=avatar]');
let $imageAvatar = $('#image-avatar');
let Profile = (function () {
    let modules = {};

    modules.saveData = function ($form, url, $btn) {
        let data = new FormData($form[0]);
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        let submitAjax = $.ajax({
            type: "POST",
            url: url,
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            window.location.href = '/user';
        });

        submitAjax.fail(function (response) {
            if (response.status === 422) {
                $btn.attr("disabled", false);
                Common.showMessage($form, response.responseJSON.errors);
            } else {
                window.location.reload()
            }
        })
    };

    modules.prevent = function (event) {
        event.preventDefault();
        event.stopPropagation()
    };

    modules.fileSelectHandler = function (event) {
        modules.prevent(event);
        let files = event.target.files || event.originalEvent.dataTransfer.files;
        if (files.length === 0) {
            $imageAvatar.prop('src', null);
            return
        }
        $imageAvatar.prop('src', URL.createObjectURL(files[0]));
    };

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    $('.btn-profile-create').on('click', function () {
        $(this).attr("disabled", true);
        Common.clearData($('#form-create-user'));
        Profile.saveData($('#form-create-user'), '/user/store', $(this));
    });

    $('.btn-profile-update').on('click', function () {
        $(this).attr("disabled", true);
        Common.clearData($('#form-update-user'));
        Profile.saveData($('#form-update-user'), '/user/update/' + $('input[name=id]').val(), $(this));
    });

    $('#image-avatar').on('click', function () {
        $('input[name=avatar]').click();
    });

    $('input[name=avatar]').on('change', function (event) {
        Profile.fileSelectHandler(event, false);
    });

    $('.delete-user').on('click', function () {
        $('#form-delete-user').attr('action', window.location.origin + '/user/delete/' + $(this).data('id'));
    })
});
