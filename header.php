<!DOCTYPE html>
<html <?php language_attributes(); ?> ng-app="mainApp">

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <meta name="p:domain_verify" content="ee2d1efea0dc4b2988bf3f26c57030d5"/>

    <!-- Development, prevent caching -->
    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT"/>
    <meta http-equiv="pragma" content="no-cache"/>

    <title><?php wp_title('&raquo;', true, 'right'); ?> 53stitches &raquo Free Amigurumi and Crochet Patterns and Tutorials</title>

    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <link rel="stylesheet" href="<?= get_stylesheet_uri(); ?>"/>

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"/>

    <?php wp_head(); ?>

    <!-- Google Analytics -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-43262289-4', 'auto');
        ga('send', 'pageview');
    </script>

    <!-- Google Adsense -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-6365070773495885",
            enable_page_level_ads: true
        });
    </script>
</head>

<body <?php body_class(); ?>>
<header>
    
    <a href="<?= site_url(); ?>"><img src="<?= get_stylesheet_directory_uri(); ?>/assets/img/logo-sm.png"
         class="pull-left logo"
         alt="53stitches Logo"
         title="53stitches Logo"/></a>

    <?php wp_nav_menu([
        'menu' => 'main-menu',
        'menu_class' => 'main-menu',
        'container' => 'div'
    ]); ?>

    <div class="mobile-menu">Menu</div>

    <ul class="social-media">
        <li><a href="//www.facebook.com/fiftythreestitches/" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="//www.instagram.com/53stitches/" rel="nofollow" target="_blank"><i class="fa fa-instagram"></i></a></li>
        <li><a href="//www.ravelry.com/designers/clare-heesh" rel="nofollow" target="_blank"><i class="fa fa-ravelry"></i></a></li>
        <li><a href="//www.53stitches.etsy.com/" rel="nofollow" target="_blank"><i class="fa fa-etsy"></i></a></li>
    </ul>

</header>
