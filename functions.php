<?php

add_editor_style();
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(300, 300, true );
add_image_size('card', 400, 150, true );
//add_image_size('banner', 1200, 900, true);

function register_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
      'secondary-menu' => __( 'Secondary Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_menus' );

// Return true if user is of the specified role, false if otherwise
// via http://docs.appthemes.com/tutorials/wordpress-check-user-role-function/
function check_user_role( $role, $user_id = null ) {
    if ( is_numeric( $user_id ) ) {
	    $user = get_userdata( $user_id );
    } else {
        $user = wp_get_current_user();
	}
    if ( empty( $user ) ) {
	    return false;
    }
    return in_array( $role, (array) $user->roles );
}

// Add social media accounts to user profile page
function add_social_media($profile_fields) {

	// Add new fields
	$profile_fields['twitter'] = 'Twitter';
	$profile_fields['instagram'] = 'Instagram';

	return $profile_fields;
}
add_filter('user_contactmethods', 'add_social_media');

// Add a 'column' taxonomy
function create_column_tax() {
    register_taxonomy(
        'series',
        'post',
        array(
            'hierarchical' => true,
            'labels' => array(
                'name' => _x( 'Series', 'taxonomy general name' ),
                'singular_name' => _x( 'Series', 'taxonomy singular name' ),
                'search_items' => __( 'Search Series' ),
                'all_items' => __( 'All Series' ),
                'parent_item' => __( 'Parent Series' ),
                'parent_item_colon' => __( 'Parent Series:' ),
                'edit_item' => __( 'Edit series' ),
                'update_item' => __( 'Update Series' ),
                'add_new_item' => __( 'Add New Series' ),
                'new_item_name' => __( 'New Location Series' ),
                'menu_name' => __( 'Series' ),
            ),
            'rewrite' => array(
                'slug' => 'series',
                'with_front' => false,
                'hierarchical' => false
            )
        )
    );
}
add_action( 'init', 'create_column_tax', 0 );

function action_unit() {
  //get cookies
  ?>
  <section class="action">
    <div class="subscribe">
      <h2>Support Independent Art!</h2>
      <p>Building an audience takes a lot of work. Show your support by subscribing to Sleeper Ave. today on your network of choice. You'll be notified when the latest cartoons launch, as well as behind-the-scenes info and the ability to participate in discussions with me and other readers. Tell your friends, too. - Ed</p>
      <div class="facebook">
        <div class="fb-like" data-href="https://facebook.com/sleeperave" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
        <script>
        function fb_action_logger() {
          FB.Event.subscribe('edge.create', function(url, element){
            console.log(url, element);
          });
        }
        </script>
      </div>
      <div class="twitter">
        <a href="https://twitter.com/sleeperave" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @sleeperave</a>
        <script>
          twttr.ready(
            function (twttr) {
              twttr.events.bind(
                'follow',
                function (event) {
                  var followedUserId = event.data.user_id;
                  var followedScreenName = event.data.screen_name;
                  console.log(followedUserId, followedScreenName);
                }
              );
            }
          );
        </script>
      </div>
    </div>
    <!-- end container -->
  </section>
<?php }

// Functions to compose a standard _card object_ based on an id
function article_card($id, $class = '') {
  // get data
  $post = get_post($id);
  $post_title = $post->post_title;
  $post_excerpt = $post->post_excerpt;
  $post_author = $post->post_author;
  $post_author_name = get_the_author_meta('display_name', $post_author);
  $post_author_url = get_author_posts_url($post_author);
  $post_date = get_the_time('m/d/y', $id);
  $post_url = get_permalink($id);
  $post_image = get_the_post_thumbnail($id, 'card', array('style' => 'max-width: 400px; height: 150px;'));
  if(!$post_image) {
    $post_image = '<img style="max-width: 400px; height: 150px;" alt="placeholder image" src="'.get_template_directory_uri().'/assets/images/default-card.png">';
  }
  // render card
  ?>
  <section type="card" class="article <?php echo $class; ?>">
    <section class="top">
      <?php echo $post_image; ?>
      <hgroup>
        <a href="<?php echo $post_url; ?>" class="card-link"></a>
        <?php if($class === 'prev') { ?>
          <div class="prev">
            <i class="fa fa-angle-left"></i>
          </div>
        <?php } ?>
        <?php if($class === 'next') { ?>
          <div class="next">
            <i class="fa fa-angle-right"></i>
          </div>
        <?php } ?>
        <h1><a class="card-title" href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h1>
        <summary class="article-excerpt">
          <?php echo $post_excerpt; ?>
        </summary>
      </hgroup>
    </section>
  </section>
  <?php
}

function user_card($id) {
  // get data
  $fullname = get_the_author_meta('display_name', $id);
  $firstname = get_the_author_meta('first_name', $id);
  //$image = get_wp_user_avatar($id, 'card');
  $image = '';
  $posts = get_author_posts_url($post_author);
  $email = get_the_author_meta('email', $id);
  $website = get_the_author_meta('user_url', $id);
  $twitter = trim(get_the_author_meta('twitter', $id), '@');
  $instagram = trim(get_the_author_meta('instagram', $id), '@');
  // render card
  ?>
  <section type="card" class="author">
    <section class="top">
      <img src="<?php echo $image; ?>" alt="background">
      <h1><?php echo $fullname; ?></h1>
    </section>
    <section class="middle">
      <ul class="social">
        <?php if(!empty($email)) { ?>
          <li>
            <a href="mailto:<?php echo $email; ?>" title="Send an email to <?php echo $firstname; ?>">
              <span class="genericond genericon genericon-mail"></span>
            </a>
          </li>
          <?php } if (!empty($website)) { ?>
            <li>
              <a href="<?php echo $website; ?>" title="Visit <?php echo $firstname; ?>'s website">
                <span class="genericond genericon genericon-website"></span>
              </a>
            </li>
            <?php } if (!empty($twitter)) { ?>
              <li>
                <a href="http://www.twitter.com/<?php echo $twitter; ?>" title="Find <?php echo $firstname; ?> on Twitter">
                  <span class="genericond genericon genericon-twitter"></span>
                </a>
              </li>
              <?php } if (!empty($instagram)) { ?>
                <li>
                  <a href="http://www.twitter.com/<?php echo $instagram; ?>" title="Find <?php echo $firstname; ?> on Instagram">
                    <span class="genericond genericon genericon-instagram"></span>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </section>
            <section class="bottom">
              <a type="button" href="<?php echo $posts; ?>">
                See <?php echo $firstname; ?>&rsquo;s Profile
              </a>
            </section>
          </section>
          <?php
        }
/*
function tag_card($id) {
    $tag = get_tag($id);
    <object type="card" class="subject">
        <section class="top">
            <img src="images/subject.jpg" alt="background">
            <h1>Campus &amp; City</h1>
        </section>
        <section class="bottom">
            <a type="button" href="#">Explore subject</a>
        </section>
    </object>
}

function tax_card($id, $tax) {
    $column = get_term($id, $tax);
}
*/

function get_404() {
  ?>
  <article class="page error-404">
    <header>
      <h1>Page Not Found</h2>
        <h2>Oops! Looks like something was swept away.</h2>
        <p><a href="<?php echo home_url(); ?>">How about our first cartoon, instead?</a></p>
      </header>
    </article>
    <?php
  }

class MY_Post_Numbers {

  private $count = 0;
  private $posts = array();

  public function display_count() {
    $this->init(); // prevent unnecessary queries
    $id = get_the_ID();
    echo sprintf( 'Part <span class="num">%s</span>', $this->posts[$id], $this->count );
  }

  private function init() {
    if ( $this->count )
    return;
    global $wpdb;
    $posts = $wpdb->get_col( "SELECT ID FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date " ); // can add or change order if you want
    $this->count = count($posts);

    foreach ( $posts as $key => $value ) {
      $this->posts[$value] = $key + 1;
    }
    unset($posts);
  }

}
$GLOBALS['my_post_numbers'] = new MY_Post_Numbers;

function my_post_number() {
  $GLOBALS['my_post_numbers']->display_count();
}
