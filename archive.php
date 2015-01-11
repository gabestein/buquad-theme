<?php get_header(); ?>
<?php

  if(is_author()) {
    $title = get_the_author();
  } else {
    $title = single_tag_title('', false);
  }

?>
<article class="archive">
  <header>
    <h1><?php echo $title; ?></h1>
  </header>
  <?php if ( have_posts() ) { ?>
    <div class="card container">
    <?php while ( have_posts() ) {
        the_post();
        article_card(get_the_id());
      }
    ?>
    <nav class="pagination">
      <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>

        <div class="alignleft"><?php next_posts_link('&larr; Older Articles') ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Articles &rarr;') ?></div>
        <?php } ?>
      </div>
  </div>
  <?php } else {
          get_404();
        } ?>
</article>
<?php get_footer(); ?>
