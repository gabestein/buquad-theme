<?php get_header(); ?>

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
<?php
  $prev_post = get_previous_post();
  article_card($prev_post->ID);
?>
<article class="single" id="<?php the_ID(); ?>">
    <?php $imgsrc = wp_get_attachment_url(get_post_thumbnail_id()); ?>

    <style>
    article.single header:before {
      background-image: url(<?php echo $imgsrc; ?>);
    }
    </style>

    <header>
        <div class="intro-text" >
            <?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
            <h4><?php my_post_number(); ?></h4>
            <h2><?php the_title(); ?></h2>
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
