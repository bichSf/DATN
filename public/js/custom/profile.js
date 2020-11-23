let $inputAvatar = $('#input-avatar'),
    $imageAvatar = $('#image-avatar');

const TYPE_IMAGES_ALLOW = ['image/jpg', 'image/png', 'image/jpeg'];

let Profile = (function () {
    let modules = {};

    modules.setEventSelectImageMap = function ($imageMap, $inputImageMap) {
        $imageMap.on('click', function (event) {
            modules.prevent(event);
            $inputImageMap.trigger('click');
        });
        $imageMap.on('dragover', function (event) {
            modules.prevent(event);
        });
        $imageMap.on('dragleave', function (event) {
            modules.prevent(event);
        });
        $imageMap.on('drop', function (event) {
            modules.fileSelectHandler(event, true, $imageMap, $inputImageMap);
        });
        $inputImageMap.on('change', function (event) {
            modules.fileSelectHandler(event, false, $imageMap, $inputImageMap);
        });
    };

    modules.fileSelectHandler = function (event, isDrop, $imageAvatar, $inputAvatar) {
        modules.prevent(event);
        let files = event.target.files || event.originalEvent.dataTransfer.files;
        if (files.length === 0) {
            return
        }
        if (isDrop) {
            $inputAvatar.prop('files', files);
        }
        $imageAvatar.html('');
        $imageAvatar.append(modules.createImageMapPreview(URL.createObjectURL(files[0])));
        modules.checkValidateImageAdd($imageAvatar, $inputAvatar);
    };

    modules.createImageMapPreview = function (src) {
        let $container = $('<div>', {
                class: "dz-default dz-message"
            }),
            $img = $('<img>', {
                class: 'img-view-custom',
                src: src
            }).appendTo($container);
        return $container;
    };

    modules.checkValidateImageAdd = function($imageAvatar, $inputAvatar) {
        let file = $inputAvatar[0].files[0];
        if (!file.type || TYPE_IMAGES_ALLOW.indexOf(file.type) === -1) {
            modules.showMessageValidateImage('Định dạng hình ảnh được phép là jpg hoặc png.');
            $imageAvatar.html('<i class="fa fa-picture-o fa-3x" aria-hidden="true"></i>');
            checkImage = false;
        } else if (file.size > 5120000) {
            $imageAvatar.html('<i class="fa fa-picture-o fa-3x" aria-hidden="true"></i>');
            modules.showMessageValidateImage('Dung lượng ảnh vượt quá 5MB');
            checkImage = false;
        } else {
            checkImage = true;
        }
        if (checkImage) {
            modules.showMessageValidateImage('');
        }
    };

    modules.showMessageValidateImage = function(message) {
        if (message === '') {
            $('p[data-error=avatar]').text(message).show();
            $('p[data-error=avatar]').removeClass('image-error').show();
        } else {
            $('p[data-error=avatar]').text(message).show();
            $('p[data-error=avatar]').addClass('image-error').show();
        }
    };

    modules.checkValidate = function (messageList) {
        let listError = $(document).find('p.image-error');
        if (listError.length !== 0) {
            $('html, body').animate({
                scrollTop: (
                    $(document).find('p.image-error').offset().top - 300
                )
            }, 300);
            return false
        } else {
            $('html, body').animate({
                scrollTop: (
                    $(document).find('p.error-message[data-error=' + Object.keys(messageList)[0] + ']').offset().top - 300
                )
            }, 300);
        }
        return true;
    };

    modules.prevent = function (event) {
        event.preventDefault();
        event.stopPropagation()
    };

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    Profile.setEventSelectImageMap($imageAvatar, $inputAvatar);

    $('.btn-create-profiles').on('click', function () {
        $(this).attr("disabled", true);
    });
})