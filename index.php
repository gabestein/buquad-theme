<?php if ( is_home() ) {
  query_posts( 'cat=1&limit=1&order=ASC' );
  include 'single.php';
  wp_reset_query();
}
