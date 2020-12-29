let nutritionFunction = (function () {
    let modules = {};


    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    $('select[name=table_type], select[name=survey_id]').on('change', function () {
        $('#form-statistical-population').submit();
    });

    $('.parent-checkbox').on('click', function () {
        $('.sub-checkbox').prop('checked', $(this).is(":checked"))
    });

    $('.sub-checkbox').on('click', function () {
        $('.parent-checkbox').prop('checked', $('.nutrition-management').find('.sub-checkbox:not(:checked)').length <= 0)
    });

    $('.delete-item').on('click', function () {
        $('#form-delete-item').attr('action', window.location.origin + '/nutrition/delete/' + $(this).data('id'));
    });

    $('.btn-delete-multi').on('click', function () {
        if ($('.nutrition-management').find('.sub-checkbox:checked').length <= 0) {
            toastr.error('Bạn chưa chọn bản ghi nào.');
        } else {
            $('#modal-delete').modal('show');
            $('#form-delete-item').attr('form-data', 'delete-multiple');
        }
    });

    $('.button-delete').on('click', function () {
        $(this).attr("disabled", true);
        let attr = $('#form-delete-item').attr('form-data');
        if (typeof attr !== typeof undefined && attr !== false) {
            $('#delete-multi-record').submit();
        } else {
            $('#form-delete-item').submit();
        }
    });
});
