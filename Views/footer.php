	<footer>Designed by Boris Henrot</footer>
    <script>
        // on attend que le document soit complètement construit
        $(document).ready(function() {

            $('#toggleMenu').on('click', function(){
                $('header')
                    .slideUp(500).
                slideDown(1500);
            });

            $('#hideAside').on('click', function(){
                $('aside').hide(2000);
            });

            $('#fadeImg').on('click', function(){
                $('img').fadeOut(3000);
            });

        });
    </script>