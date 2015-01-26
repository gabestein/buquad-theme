<?php
  query_posts( 'cat=1&limit=1&order=ASC' );
  while ( have_posts() ) {
    the_post();
    article_card(get_the_id());
  }
  ?>
</div>
<?php } else {
  get_404();
} ?>
