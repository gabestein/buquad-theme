<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<div class="container">
<?php while ( have_posts() ) : the_post();
          article_card(the_ID());
      endwhile; ?>
</div>
<?php else :
          get_404();
      endif; ?>

<?php get_footer(); ?>