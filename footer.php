        <footer>
            <!-- FOOTER SECTION -->
        </footer>
        <?php wp_footer(); ?>

        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-menu' ) ); ?>
        <script>
        (function($) {
          window.visits = $.cookie('visits') || 0;
          if(parseInt(window.visits) <= 6) {
            window.visits = parseInt(window.visits) + 1;
            $.cookie('visits', window.visits, { expires: 7300, path: '/' });
          }
        })(jQuery);
        </script>
    </body>
</html>
