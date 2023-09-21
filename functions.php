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
