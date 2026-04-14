(function ($) {
    $(function () {
        $('#userSearch').on('input', function () {
            var value = $(this).val().toLowerCase();
            $('table tbody tr').each(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) !== -1);
            });
        });

        $('#userModalForm').on('submit', function (event) {
            event.preventDefault();
        });
    });
})(window.jQuery);
