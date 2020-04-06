<?php get_header(); ?>
	
	<!----------------------------------------------------------------------------------------------------------------------
	Main Content
	----------------------------------------------------------------------------------------------------------------------->
	<div class="parent container">
		<div class="row">
			<div class="entry-content col col-12">
				
				<?php if (function_exists( 'woocommerce_content' )) : woocommerce_content(); endif; ?>
			
			</div>
		</div>
	</div>
	
	</div><!-- ./container -->
<?php get_footer();