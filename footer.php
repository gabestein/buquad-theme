        <footer>
            <!-- FOOTER SECTION -->
        </footer>
        <?php wp_footer(); ?>

        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-menu' ) ); ?>
        <script>
        (function($) {
          window.visits = $.cookie('visits') || 0;
          if(window.visits === 0) {
            $.cookie('visits', 1, { expires: 7300, path: '/' });
          } else if(window.visits <= 6) {
            var visits = parseInt(window.visits)++;
            $.cookie('visits', visits, { expires: 7300, path: '/' });
          }
        })(jQuery);
        </script>
    </body>
</html>
