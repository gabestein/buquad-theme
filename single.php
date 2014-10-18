<?php get_header(); ?>

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>

<article class="single" id="<?php the_ID(); ?>">
    
    <header>
        <?php the_post_thumbnail(
            'banner',
            array( 'class' => 'hero-image' )
        ); ?>
        <div class="intro-text">
            <?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
            <h2><?php the_title(); ?></h2>
            <h3><?php the_time('F j, Y')?></h3>
            <h4>by <?php the_author_posts_link(); ?></h4>
        </div>
    </header>
    <section class="body">
        <?php the_content('Read More'); ?>
        <?php wp_link_pages(array('before' => '<div class="paginate">Page:', 'after' => '</div>', 'next_or_number' => 'number')); ?>
    </section>
    <footer>
        <!--<?php user_card(get_the_author_meta('ID')); ?>-->
    </footer>
</article>

<?php } /* close while */ } else { ?>

<article class="404">
    <h1>Not Found</h1>
    <p>Sorry, but you are looking for something that isn't here.</p>
</article>

<?php } /* close if */ ?>
<?php get_footer(); ?>
