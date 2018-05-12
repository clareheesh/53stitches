<?php

/**
 *
 * Sets up the theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs befor the init hook.
 * The init hook is too late for some features, such as indicating support for post thumbnails.
 *
 **/
// Add default posts and comments RSS feed links to head
add_theme_support('automatic-feed-links');

// Enable support for Post Thumbnails on posts and pages.
add_theme_support('post-thumbnails');

// Add theme support for HTML5 markup
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'widgets'));

//Add theme support for Post Formats
add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

// Add theme support for the document title tag
add_theme_support('title-tag');

// Add theme support for custom backgrounds
add_theme_support('custom-background');

// Add theme support for custom header
add_theme_support('custom-header');

// Enable support for Post Thumbnails on posts and pages.
add_theme_support('post-thumbnails');

// Declare theme support for Woocommerce
add_theme_support('woocommerce');


// Register a default menu
register_nav_menu( 'main-menu', 'Main Menu');


/** Set default image link to none */
update_option('image_default_link_type', 'none');


/** Enqueue Stylesheets and Scripts */
add_action('wp_enqueue_scripts', 'stitch_scripts');
function stitch_scripts() {

    // Javascript
//    wp_register_script('stitch-script', get_stylesheet_directory_uri() . '/assets/dist/script.js', array('jquery'), '', true);
    wp_register_script('stitch-script', get_stylesheet_directory_uri() . '/assets/dist/js/scripts.min.js', array('jquery'), '0.122', true);

    // Temp - load other scripts
//    wp_enqueue_script('matchHeight', get_stylesheet_directory_uri() . '/assets/src/js/matchHeight.js', array('jquery'), '', true);
//    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/assets/src/js/slick.min.js', array('jquery'), '', true);
//    wp_enqueue_script('tether', get_stylesheet_directory_uri() . '/assets/src/js/1tether.min.js', array('jquery'), '', true);
//    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/src/js/bootstrap.js', array('jquery', 'tether'), '', true);

    //Localise AJAX script
    wp_localize_script('stitch-script', 'sfajax', array('ajaxurl' => admin_url('admin-ajax.php')));

    // Google Fonts
    wp_register_style('fonts', '//fonts.googleapis.com/css?family=Montserrat:200,400,600|PT+Serif');


    wp_enqueue_style('fonts');
    wp_enqueue_script('stitch-script');

    // Always queue last, editable stylesheet
//    wp_enqueue_style('sf-style', get_stylesheet_uri(), 100);
}


/**
 *
 * Change the excerpt length to 200 words
 *
 **/
add_filter('excerpt_length', 'custom_excerpt_length', 999);
if (!function_exists('custom_excerpt_length')) {
    function custom_excerpt_length($length)
    {
        return 200;
    }
}


/**
 *
 * Change default exceprt more to ...
 *
 */
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more)
{
    return '...';
}


/**
 * Turn the Wordpress widget into a shortcode
 */
add_shortcode('show_instagram','stitch_insta');
function stitch_insta() {

    ob_start();

    the_widget('null_instagram_widget', array(
        'size' => 'large',
        'number' => 3,
        'target' => '_blank',
        'username' => '53stitches'
    ), []);

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

/** Register the default sidebar */
add_action('init', 'stitch_register_sidebar');
function stitch_register_sidebar() {

    register_sidebar([
        'name' => 'Sidebar',
        'id' => 'default-sidebar'
    ]);
}