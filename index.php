<h1>Home</h1><?php
  query_posts( 'cat=1&limit=1&order=ASC' );
  while ( have_posts() ) {
    the_post();
    article_card(get_the_id());
  }
  ?>
<?php } else {
  get_404();
}
wp_reset_query();
?>
