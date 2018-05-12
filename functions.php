<?php

include('inc/init.php'); // Setup theme supports, menu's, sidebars, etc.

// Extend the archive title filter
add_filter('get_the_archive_title', function ($title) {

  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  }

  return $title;
});

/**
 * Return an array of the possible difficulty labels
 *
 * @return array
 */
function get_difficulties()
{
  return ['', 'Beginner', 'Easy', 'Skilled', 'Challenging'];
}

if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}