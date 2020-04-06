<?php if (is_user_logged_in()) : ?>
	
	<?php get_header(); ?>
	
	<?php if (have_rows( 'modules' )) : ?>
		
		<?php while (have_rows( 'modules' )) : the_row(); ?>
			
			<?php
			// Get the row layout and call the corresponding template file
			$layout = get_row_layout();
			get_template_part( 'modules/module', $layout )
			?>
		
		<?php endwhile; ?>
	
	<?php endif; ?>
	
	<?php get_footer(); ?>

<?php else : ?>
	
	<!DOCTYPE html>
	<html <?php language_attributes(); ?> ng-app="mainApp">
	
	<head>
		
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		
		<meta name="p:domain_verify" content="ee2d1efea0dc4b2988bf3f26c57030d5"/>
		
		<!-- Development, prevent caching -->
		<meta http-equiv="cache-control" content="max-age=0"/>
		<meta http-equiv="cache-control" content="no-cache"/>
		<meta http-equiv="expires" content="0"/>
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT"/>
		<meta http-equiv="pragma" content="no-cache"/>
		
		<title><?php wp_title( '&raquo;', true, 'right' );
			bloginfo( 'name' ); ?></title>
		
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
		
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"/>
		
		<?php if (is_singular() && get_option( 'thread_comments' ))
			wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
		
		<script>
      (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r
        i[r] = i[r] || function () {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date()
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0]
        a.async = 1
        a.src = g
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga')

      ga('create', 'UA-43262289-4', 'auto')
      ga('send', 'pageview')
		
		</script>
		
		<style>
			body {
				font-family: 'Helvetica', sans-serif;
				color: #121212;
				font-weight: 100;
				text-transform: uppercase;
				text-align: center;
				max-width: 100%;
				background: #3e3e3e;
				
				background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/img/bg.JPG') !important;
				background-size: cover !important;
				background-repeat: no-repeat !important;
				background-position: center !important;
			}
			
			body, html {
				margin: 0;
				padding: 0;
			}
			
			body.admin-bar {
				margin-top: -32px;
			}
			
			@media (min-width: 769px) {
				.container-full {
					display: flex;
					align-items: center;
					justify-content: center;
				}
			}
			
			.half {
				width: 50%;
				height: 100vh;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			
			.half span {
				font-size: 3em;
				color: white;
				display: inline-block;
				padding: 20px;
				border: 2px solid white;
			}
			
			@media (max-width: 768px) {
				
				.half {
					width: 100%;
					height: 50vh;
				}
			}
			
			a:hover {
				text-decoration: none;
				color: inherit;
			}
			
			a:hover span {
				background: rgba(255, 255, 255, 0.2);
			}
			
			.tags {
				margin: 0 auto;
				text-transform: lowercase;
				font-style: italic;
				font-size: 18px;
				color: white;
			}
			
			.left {
				background: rgba(0, 0, 0, .2);
			}
			
			.right {
				background: rgba(0, 0, 0, .1);
			}
		
		</style>
	</head>
	
	<body <?php body_class(); ?>>
	<div class="container-full">
		<div class="half left">
			<a href="http://53stitches.etsy.com">
				<span>Shop</span>
				<div class="tags">
					dolls, paid patterns and custom orders
				</div>
			</a>
		</div>
		<div class="half right">
			
			<a href="http://53stitches.tumblr.com">
				<span>Blog</span>
				<div class="tags">
					free patterns and tutorials
				</div>
			</a>
		</div>
	</div>
	</body>
	
	<?php wp_footer(); ?>
	</body>
	
	</html>

<?php endif; ?>
