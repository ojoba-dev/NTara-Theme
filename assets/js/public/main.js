document.addEventListener('DOMContentLoaded', function () {

    // product modal — fetch single product page and show it in an overlay
    var modal     = document.getElementById('product-modal');
    var modalBody = modal ? modal.querySelector('.product-modal-body') : null;

    function closeModal() {
        modal.hidden = true;
        document.body.classList.remove('modal-open');
        modalBody.innerHTML = '';
    }

    if (modal) {
        document.addEventListener('click', function (e) {
            var trigger = e.target.closest('.product-modal-trigger');
            if (!trigger) return;
            e.preventDefault();

            modalBody.innerHTML = '<p class="modal-loading">Loading...</p>';
            modal.hidden = false;
            document.body.classList.add('modal-open');

            fetch(trigger.dataset.url)
                .then(function (res) { return res.text(); })
                .then(function (html) {
                    var doc   = new DOMParser().parseFromString(html, 'text/html');
                    var imgEl = doc.querySelector('.product-image img');
                    var title = doc.querySelector('.product-title');
                    var price = doc.querySelector('.card-price');
                    var desc  = doc.querySelector('.product-description');

                    var out = '<div class="modal-product">';

                    if (imgEl) {
                        out += '<div class="modal-product-image"><img src="' + imgEl.getAttribute('src') + '" alt="' + (imgEl.getAttribute('alt') || '') + '"></div>';
                    }

                    out += '<div class="modal-product-info">';
                    if (title) out += '<h2 class="modal-product-title">' + title.textContent.trim() + '</h2>';
                    if (price) out += '<p class="modal-product-price">' + price.textContent.trim() + '</p>';
                    if (desc && desc.innerHTML.trim()) out += '<div class="modal-product-desc">' + desc.innerHTML + '</div>';
                    out += '<button class="modal-back-btn" type="button">&#8592; Back to Store</button>';
                    out += '</div></div>';

                    modalBody.innerHTML = out;

                    var backBtn = modalBody.querySelector('.modal-back-btn');
                    if (backBtn) backBtn.addEventListener('click', closeModal);
                })
                .catch(function () {
                    modalBody.innerHTML = '<p class="modal-error">Something went wrong, try again.</p>';
                });
        });

        modal.querySelector('.product-modal-close').addEventListener('click', closeModal);
        modal.querySelector('.product-modal-overlay').addEventListener('click', closeModal);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modal.hidden) closeModal();
        });
    }

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
