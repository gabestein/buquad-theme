<?php get_header(); ?>

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>


<article class="single" id="<?php the_ID(); ?>">
    $imgurl = wp_get_attachment_image_src(the_post_thumbnail('banner'))['0'];
    <header style="background-image:url($imgurl);">
        <div>
        <h1><?php the_title(); ?></h1>
        <h2><?php the_time('F j, Y')?> at <?php the_time('g:i a')?></h2>
        <?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
        </div>
        <?php user_card(the_author_meta('ID')) ?>
    </header>
    <?php the_content('Read More'); ?>
    <?php wp_link_pages(array('before' => '<div class="paginate">Page:', 'after' => '</div>', 'next_or_number' => 'number')); ?>
    <footer>
    </footer>
</article>

<?php } /* close while */ } else { ?>

<article class="404">
    <h1>Not Found</h1>
    <p>Sorry, but you are looking for something that isn't here.</p>
</article>

<?php } /* close if */ ?>
<?php get_footer(); ?>