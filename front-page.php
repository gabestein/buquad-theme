<?php
query_posts('cat=1&limit=1&order=ASC');
include 'single-stories.php';
wp_reset_query();
