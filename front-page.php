<?php
query_posts('cat=1&limit=1&order=DESC');
include 'single-stories.php';
wp_reset_query();
