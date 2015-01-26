<?php
query_posts('cat=1&posts_per_page=1&order=DESC');
include 'single-stories.php';
wp_reset_query();
