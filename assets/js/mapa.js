(function ($) {
    $(function () {
        $('.branch-dot').on('click', function () {
            var index = Number($(this).data('branch'));
            $('.branch-dot').removeClass('active');
            $(this).addClass('active');
            $('.branch-card').removeClass('active').eq(index).addClass('active');
        });
    });
})(window.jQuery);
