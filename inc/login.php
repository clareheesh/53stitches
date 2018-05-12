<?php

/**
 * Replace login logo
 */
function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
            padding-bottom: 30px;
            background-size: 200px;
            width: 200px;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );

/**
 * Redirect user to login page on fail
 */
add_action( 'login_redirect', 'redirect_login', 10, 3 );
function redirect_login( $redirect_to, $url, $user ) {
    if( $user->errors['empty_password'] ) {
        wp_redirect( get_bloginfo( 'url' ) . '/login/?login=failed' );
    } else if( $user->errors['empty_username'] ) {
        wp_redirect( get_bloginfo( 'url' ) . '/login/?login=failed' );
    } else if( $user->errors['invalid_username'] ) {
        wp_redirect( get_bloginfo( 'url' ) . '/login/?login=failed' );
    } else if( $user->errors['incorrect_password'] ) {
        wp_redirect( get_bloginfo( 'url' ) . '/login/?login=failed' );
    } else if( $user->id != 0 ) {
        // User was successfully logged in, redirect home
        wp_redirect( get_bloginfo( 'url' ) );

    } else {
        // Empty form submission, or on logout
        wp_redirect( get_bloginfo( 'url' ) . '/login/' );
    }
    exit;
}

/** Redirect users to Home page unless login page */
add_action('wp', 'redirect_to_home');
function redirect_to_home() {

    global $pagenow;

    if( !is_user_logged_in() && !is_front_page() && !is_page('login')) {
        // Redirect to home page
        wp_redirect( home_url() );
        exit;
    }
}

/**
 * Redirect logged-out users
 */
add_action( 'admin_init', 'redirect_non_logged_users_to_specific_page' );
function redirect_non_logged_users_to_specific_page() {

    if( !is_user_logged_in() && !is_page( 'login' ) && $_SERVER['PHP_SELF'] != '/wp-admin/admin-ajax.php' ) {

        wp_redirect( site_url() . '/login' );
        exit;
    }
}