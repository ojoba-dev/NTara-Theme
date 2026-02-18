document.addEventListener('DOMContentLoaded', function () {

    // category filter — sidebar links update the URL, no page reload needed
    document.querySelectorAll('.sidebar-filter-link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            var slug    = this.dataset.slug;
            var archive = this.dataset.archive;
            var params  = new URLSearchParams(window.location.search);
            var current = params.getAll('category[]');

            if (slug === '') {
                // "View All" — clear all category filters
                params.delete('category[]');
            } else if (current.indexOf(slug) > -1) {
                // Already active — deselect it
                var updated = current.filter(function (s) { return s !== slug; });
                params.delete('category[]');
                updated.forEach(function (s) { params.append('category[]', s); });
            } else {
                // Not active — add it
                params.append('category[]', slug);
            }

            // Always reset pagination when changing the category filter
            params.delete('paged');

            window.location.href = archive + (params.toString() ? '?' + params.toString() : '');
        });
    });

    // sort — carry over active category filters when the sort form submits
    var sortSelect = document.getElementById('ntara-sort');
    if (sortSelect) {
        var sortForm   = sortSelect.closest('form');
        var urlParams  = new URLSearchParams(window.location.search);
        var categories = urlParams.getAll('category[]');

        categories.forEach(function (cat) {
            var input  = document.createElement('input');
            input.type  = 'hidden';
            input.name  = 'category[]';
            input.value = cat;
            sortForm.appendChild(input);
        });

        sortSelect.addEventListener('change', function () {
            sortForm.submit();
        });
    }

});
