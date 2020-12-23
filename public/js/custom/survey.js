$(document).ready(function () {
    $('#delete-survey').on('click', function () {
        console.log(1111, window.location.origin + '/survey/delete/' + $(this).data('id'))
        $('#form-delete-survey').attr('action', window.location.origin + '/survey/delete/' + $(this).data('id'));
    })
});
