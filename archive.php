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
        the_post(); ?>
        <article class="archive blog">
          <header>
            <h2><a href="<?php the_permalink(); ?>" title="permalink"><?php the_title(); ?></a></h2>
            <h3><?php the_date(); ?></h3>
          </header>
          <section class="body">
            <?php the_excerpt(); ?>
          </section>
        </article>
    <?php  }
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
