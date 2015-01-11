<?php get_header(); ?>

<?php if ( have_posts() ) { ?>
  <div class="card container">
  <?php while ( have_posts() ) {
      the_post();
      article_card(get_the_id());
    }
  ?>
</div>
<?php } else {
        get_404();
      } ?>

<?php get_footer(); ?>