$(document).ready(function () {
    $('#delete-survey').on('click', function () {
        $('#form-delete-survey').attr('action', window.location.origin + '/survey/delete/' + $(this).data('id'));
    });

    $('select[name=area_id], select[name=month], select[name=year]').on('change', function () {
        $('#form-statistical-population').submit();
    })
});
