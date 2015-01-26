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
    <div class="container">
    <?php while ( have_posts() ) {
        the_post(); ?>
        <article class="archive" id="<?php the_ID(); ?>">
          <header>
            <div class="intro-text" >
              <h2><?php the_title(); ?></h2>
              <h3><?php the_date(); ?></h3>
              <?php the_excerpt(); ?>
              <?php the_permalink(); ?>
            </div>
          </header>
          <section class="body">
            <?php the_excerpt(); ?>
            <?php the_permalink(); ?>
          </section>
        </article>
    <?php } ?>
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
