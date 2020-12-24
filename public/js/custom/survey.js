$(document).ready(function () {
    $('#delete-survey').on('click', function () {
        $('#form-delete-survey').attr('action', window.location.origin + '/survey/delete/' + $(this).data('id'));
    })
});
