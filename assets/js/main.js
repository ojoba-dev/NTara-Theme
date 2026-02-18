document.addEventListener('DOMContentLoaded', function () {

    // Auto-submit sort form when the select value changes
    var sortSelect = document.getElementById('ntara-sort');
    if (sortSelect) {
        sortSelect.addEventListener('change', function () {
            this.closest('form').submit();
        });
    }

});
