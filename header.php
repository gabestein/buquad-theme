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
		<meta property="og:site_name" content="The Quad" />
		<!-- TWITTER CARDS -->
		<meta property="twitter:card" content="summary" />
		<meta property="twitter:site" content="@buquad" />
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
		<meta name="twitter:site" content="@buquad"/>
		<meta name="twitter:title" content="<?php echo $title; ?>"/>
		<meta name="twitter:description" content="<?php echo $description; ?>"/>
		<meta name="twitter:image" content="<?php echo $image; ?>" />
	    <?php } ?>

        <!-- begin GOOGLE ANALYTICS -->
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-20901984-1']);
            _gaq.push(['_setDomainName', '.buquad.com']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <script type="text/javascript">
          function recordOutboundLink(link, category, action) {
            _gat._getTrackerByName()._trackEvent(category, action);
            setTimeout('document.location = "' + link.href + '"', 100);
          }
        </script>
        <!-- end GOOGLE ANALYTICS -->

        <?php wp_head(); ?>

    </head>
    <body>
        <header>
            <!-- MENU BAR -->
	    <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_class' => 'primary-menu' ) ); ?>
	    <?php wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'container_class' => 'secondary-menu' ) ); ?>
        </header>
