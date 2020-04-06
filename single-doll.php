<?php acf_form_head(); ?>
<?php get_header(); ?>
	<div class="parent container">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="entry-content col-sm-8 col-xs-12">
				
				<h1><?php the_title(); ?></h1>
				
				<!-- Price -->
				<?php if (get_post_meta( get_the_ID(), 'price', true )) : ?>
					<p><strong>Price</strong></p>
					<p><?= get_post_meta( get_the_ID(), 'price', true ); ?></p>
				<?php endif; ?>
				<!-- Date Listed -->
				<?php if (get_post_meta( get_the_ID(), 'date_listed', true )) : ?>
					<p><strong>Date Listed</strong></p>
					<p><?= get_post_meta( get_the_ID(), 'date_listed', true ); ?></p>
				<?php endif; ?>
				<!-- Doll Link -->
				<?php if (get_post_meta( get_the_ID(), 'doll_link', true )) : ?>
					<p><strong>Doll Link</strong></p>
					<p><a href="<?= get_post_meta( get_the_ID(), 'doll_link', true ); ?>">Doll Link</a></p>
				<?php endif; ?>
				<!-- Pattern Link -->
				<?php if (get_post_meta( get_the_ID(), 'pattern_link', true )) : ?>
					<p><strong>Pattern Link</strong></p>
					<p><a href="<?= get_post_meta( get_the_ID(), 'pattern_link', true ); ?>">Pattern Link</a></p>
				<?php endif; ?>
				<!-- Sales -->
				<?php if (get_post_meta( get_the_ID(), 'sales', true )) : ?>
					<p><strong>Sales</strong></p>
					<p><?= get_post_meta( get_the_ID(), 'sales', true ); ?></p>
				<?php endif; ?>
				
				<!-- Favourites -->
				<?php if (get_post_meta( get_the_ID(), 'favourites', true )) : ?>
					<p><strong>Favourites</strong></p>
					<p><?= get_post_meta( get_the_ID(), 'favourites', true ); ?></p>
				<?php endif; ?>
				<!-- Stock -->
				<?php if (get_post_meta( get_the_ID(), 'stock', true )) : ?>
					<p><strong>Stock</strong></p>
					<p><?= get_post_meta( get_the_ID(), 'stock', true ); ?></p>
				<?php endif; ?>
				<!-- Tags -->
				<p><strong>Tags</strong></p>
				<?php the_tags(); ?>
			
			
			</div>
			
			<div class="sidebar-content col-sm-4 col-xs-12">
				<?php get_sidebar(); ?>
			</div>
		
		<?php endwhile; endif; ?>
	
	</div><!-- ./content -->
<?php get_footer();
