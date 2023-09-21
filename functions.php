<?php
function title_tag_support()
{
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'title_tag_support');

function baw_hack_wp_title_for_home($title)
{
  if (empty($title) && (is_home() || is_front_page())) {
    return __('Home', 'theme_domain') . ' | ' . get_bloginfo('description');
  }
  return $title;
}

add_filter('wp_title', 'baw_hack_wp_title_for_home');

function live_reload()
{
  $to_write = <<<WRITE
  <script>document.write('<script src="http://'
    + (location.host || 'localhost').split(':')[0]
    + ':35729/livereload.js"></'
    + 'script>')</script>
  WRITE;
  echo $to_write;
}

add_action('wp_footer', 'live_reload', 100);
