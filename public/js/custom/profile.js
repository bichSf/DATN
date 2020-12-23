let $inputAvatar = $('input[name=avatar]');
let $imageAvatar = $('#image-avatar');
let Profile = (function () {
    let modules = {};

    modules.saveData = function () {
        let data = new FormData($('#form-create-user')[0]);
        data.append("_token", $('meta[name="csrf-token"]').attr('content'));
        let submitAjax = $.ajax({
            type: "POST",
            url: window.origin + '/user/store',
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (response) {
            window.location.href = '/user';
        });

        submitAjax.fail(function (response) {
            window.location.href = '/user';
        })
    }

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
        Profile.saveData();
    });

    $('#image-avatar').on('click', function () {
        $('input[name=avatar]').click();
    });

    $('input[name=avatar]').on('change', function (event) {
        Profile.fileSelectHandler(event, false);
    })
});
