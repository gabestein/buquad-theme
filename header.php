<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      <?php language_attributes(); ?>>
    <head>
        <title><?php bloginfo('name'); ?></title>

        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" />
	    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon.png" />
	    <link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <!-- SOCIAL MEDIA INTEGRATION -->
      <?php if(have_posts()):while(have_posts()):the_post();endwhile;endif; ?>
        <?php if (is_single()) {
          $url = get_the_permalink();
          $title = get_the_title('');
          $description = strip_tags(get_the_excerpt($post->ID));
          $image = '';
          if (function_exists('wp_get_attachment_image_src')) {
            $image = (wp_get_attachment_image_src(get_post_thumbnail_id(), 'social')[0]);
          } else {
            $image = get_template_directory_uri().'/assets/images/placeholder.png';
          }
          ?>
          <!-- FACEBOOK OPEN GRAPH -->
          <meta property="og:url" content="<?php echo $url; ?>"/>
          <meta property="og:title" content="<?php echo $title; ?>" />
          <meta property="og:description" content="<?php echo $description; ?>" />
          <meta property="og:image" content="<?php echo $image; ?>" />
          <meta property="og:type" content="article" />
          <meta property="og:site_name" content="Sleeper Ave." />
          <!-- TWITTER CARDS -->
          <meta property="twitter:card" content="summary" />
          <meta property="twitter:site" content="@sleeperave" />
          <meta property="twitter:title" content="<?php echo $title; ?>" />
          <meta property="twitter:description" content="<?php echo $description; ?>" />
          <meta name="twitter:image" content="<?php echo $image; ?>" />
          <meta property="twitter:creator" content="<?php echo the_author_meta('twitter'); ?>" />

          <?php } else {
            $url = get_bloginfo('url');
            $title = get_bloginfo('name');
            $description = get_bloginfo('description');
            $image = get_template_directory_uri().'/images/placeholder.png';
            ?>
            <!-- FACEBOOK OPEN GRAPH -->
            <meta property="og:url" content="<?php echo $url; ?>"/>
            <meta property="og:title" content="<?php echo $title; ?>"/>
            <meta property="og:site_name" content="<?php echo $title; ?>"/>
            <meta property="og:description" content="<?php echo $description; ?>"/>
            <meta property="og:type" content="website"/>
            <meta property="og:image" content="<?php echo $image; ?>"/>
            <!-- TWITTER CARDS -->
            <meta name="twitter:card" content="summary"/>
            <meta name="twitter:site" content="@sleepeerave"/>
            <meta name="twitter:title" content="<?php echo $title; ?>"/>
            <meta name="twitter:description" content="<?php echo $description; ?>"/>
            <meta name="twitter:image" content="<?php echo $image; ?>" />
            <?php } ?>

        <!-- begin GOOGLE ANALYTICS -->
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-58555638-1', 'auto');
        ga('send', 'pageview');

        </script>
        <!-- end GOOGLE ANALYTICS -->
        <!-- Twitter JS API -->
        <script>
          window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f) {
              t._e.push(f);
            };

            return t;
          }(document, "script", "twitter-wjs"));
        </script>
        <!-- end Twitter JS API -->

        <!-- Facebook JS API -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=432054876917734&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- end Facebook JS API -->

        <?php wp_head(); ?>

    </head>
    <body>
      <header>
            <section id="brand">
              <a href="http://sleeperave.com">
                <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sleeper-logo.png" alt="Sleeper Ave. Logo">
              </a>
              <div class="bg">
                <img class="bg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/antenna_sm.png" alt="Houses with antenna">
              </div>
            </section>
            <!-- MENU BAR -->
	           <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_class' => 'primary-menu' ) ); ?>
	    <!-- <?php wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'container_class' => 'secondary-menu' ) ); ?>-->
        </header>
