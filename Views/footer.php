	<footer>Designed by Boris Henrot</footer>
    <script>
        // on attend que le document soit complètement construit
        $(document).ready(function() {
            $('aside').hide(2000);
            $('img').fadeOut(3000);
            $('header')
                .slideUp(500)
                .slideDown(1500);
        });
    </script>