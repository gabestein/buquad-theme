<?php get_header(); ?>

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
<section class="recommender">
  <?php

    $prev_post = get_previous_post();
    if($prev_post !== '') {
      article_card($prev_post->ID, 'prev');
    }

    $next_post = get_next_post();
    if($next_post !== '') {
      article_card($next_post->ID, 'next');
    }

    //get our actions
    action_unit();

  ?>
</section>
<article class="single" id="<?php the_ID(); ?>">
    <?php $imgsrc = wp_get_attachment_url(get_post_thumbnail_id()); ?>

    <!--<style>
    article.single header:before {
      background-image: url(<?php echo $imgsrc; ?>);
    }
  </style>-->

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
      <section class="plea">
        <p class="comments"><strong>Thoughts, comments or questions about this story?</strong> Send me a note <a href="/feedback">here</a>, or via email at <a href="mailto:ed@sleeperave.com?subject=Comment on <?php echo $get_the_title(); ?>" target="_blank">ed@sleeperave.com</a>. I publish my favorite comments weekly on my blog.</p>
        <p class="appeal">After a 37-year career in print, it's not easy building an audience from scratch. So if you enjoy Sleeper Ave., please help me out by subscribing, donating if you can, but most importantly, spreading the word. Share this story on Facebook, Twitter and elsewhere, email it to your friends, let people know! Every little bit helps, and I'll be forever grateful. Thanks! -- Ed</p>
        <div class="shares-subscribe">
        </div>
      </section>
        <!--<?php user_card(get_the_author_meta('ID')); ?>-->
    </footer>
</article>

<section class="recommender">
  <?php

  $prev_post = get_previous_post();
  if($prev_post !== '') {
    article_card($prev_post->ID, 'prev');
  }

  $next_post = get_next_post();
  if($next_post !== '') {
    article_card($next_post->ID, 'next');
  }

  //get our actions
  action_unit();

  ?>
</section>
<?php } /* close while */ } else { ?>

<article class="404">
    <h1>Not Found</h1>
    <p>Sorry, but you are looking for something that isn't here.</p>
</article>

<?php } /* close if */ ?>
<?php get_footer(); ?>
