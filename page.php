<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post();
?>

<article class="page" id="<?php the_ID(); ?>">
    <header>
        <h1><?php the_title(); ?></h1>
    </header>
    <section class="body">
        <?php the_content('Read More'); ?>
        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </section>
</article>

<?php
endwhile; endif;
get_footer();
?>