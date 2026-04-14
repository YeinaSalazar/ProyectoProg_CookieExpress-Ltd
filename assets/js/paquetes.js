(function ($) {
    $(function () {
        $('#trackingForm').on('submit', function (event) {
            event.preventDefault();
            if (!this.checkValidity()) {
                this.reportValidity();
                return;
            }

            $('#trackingResult').find('.status-badge').text('En transito');
        });
    });
})(window.jQuery);
