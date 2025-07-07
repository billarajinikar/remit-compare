<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/proper-min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<!--=== All Plugin ===-->
<script src="/assets/js/plugin/waypoint.min.js"></script>
<script src="/assets/js/plugin/owl.carousel.min.js"></script>
<script src="/assets/js/plugin/jquery.rcounter.js"></script>
<script src="/assets/js/plugin/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/plugin/jquery.nice-select.min.js"></script>

<!--=== All Active ===-->
<script src="/assets/js/main.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("search-form");
        const skeleton = document.getElementById("skeleton-loader");
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            const ratesResults = document.getElementById("rates-results"); // ✅ moved here

            skeleton.style.display = 'block';
            ratesResults.style.display = 'none';

            const formData = new FormData(form);
            const params = new URLSearchParams(formData);

            fetch(form.action + '?' + params.toString(), {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newRates = doc.querySelector('#rates-results');
                    if (newRates) {
                        ratesResults.innerHTML = newRates.innerHTML;
                    }

                    // Show updated results, hide loader
                    skeleton.style.display = 'none';
                    ratesResults.style.display = 'block';
                })
                .catch(err => {
                    console.error("Error loading rates:", err);
                    skeleton.style.display = 'none';
                    ratesResults.style.display = 'block';
                });
        });
    });
</script>
