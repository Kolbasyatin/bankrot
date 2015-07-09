jQuery(function ($) {
    'use strict';

    var $show = $('#show');

    $('#lots td').on('click', function (e) {
        var href = $(this).parents('tr[data-href]').eq(0).data('href');

        if (href) {
            $show.find('.content').html('<i class="fa fa-spin fa-spinner"></i>');
            $show.modal();

            $.ajax({
                url: href,
                dataType: 'html',
                success: function (html) {
                    $show.find('.content').html(html);
                }
            });

            return false;
        }
    });

    $('.infinite-scroll').jscroll({
        contentSelector: 'table',
        callback: function (a) {
            $('.infinite-scroll').find('tbody').eq(0).append($('.jscroll-added').find('tbody').html());

            $('.jscroll-added').remove();
        }
    });
});
