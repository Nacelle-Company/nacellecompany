<?php

$blog_id = get_current_blog_id();

if (1 == $blog_id) {
  $title = get_bloginfo('name');
  $catalogPath = '/category/distribution/';
  $fillColor = '#2c2c2c';
} else {
  $title = 'Nacelle';
  $catalogPath = '/products/';
  $fillColor = '#fff';
}
$hasNewsPosts = get_posts('post_type=news');
$hasPressPosts = get_posts('post_type=press');
$hasPRPosts = get_posts('post_type=press_release');
