<?php get_header(); ?>

<?php global $wp_query; ?>
<?php $difficulties = get_difficulties(); ?>

<?php $single = get_field( 'featured_post', 'option' ); ?>
<?php if ($single) : ?>
	<div class="archive__featured featured-post">
		<div class="container">
			<div class="row">
				
				<div class="col col-12 col-md-6 col-lg-4">
					<div class="featured-post__content">
						<h2><a href="<?= get_post_permalink( $single ); ?>"><?= get_the_title( $single ); ?></a></h2>
						
						<a class="read-more" href="<?= get_post_permalink( $single ); ?>">Read More <i
								class="fa fa-caret-right"></i></a>
						
						<?= wpautop( get_the_excerpt( $single ) ); ?>
						
						<?php $difficulty = get_field( 'difficulty', $single ); ?>
						<?php if ($difficulty) : ?>
							<div title="<?= $difficulties[$difficulty]; ?>" class="featured-post__difficulty">
								<span class="difficulty difficulty--green difficulty--<?= $difficulty; ?>"></span>
								<span><?= $difficulties[$difficulty]; ?></span>
							</div>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="col col-12 col-md-6 col-lg-8">
					<div class="featured-post__image label-container"
							 style="background-image: url('<?= get_the_post_thumbnail_url( $single, 'full' ); ?>');">
						<?php if (strtotime( get_the_date( 'Y-m-d', $single ) ) > strtotime( 'today - 1 month' )) : ?>
							<span class="label label--new">New</span>
						<?php endif; ?>
					</div>
				</div>
			
			</div>
		</div>
	</div>
<?php endif; ?>
	
	<div class="archive__container">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h1><?= get_the_archive_title(); ?></h1>
				</div>
			</div>
			
			<div class="archive__filters archive__filters--space-between">
				<div class="text-left">
					<?= $wp_query->found_posts; ?> results, <?= $wp_query->max_num_pages; ?> pages
				</div>
				<div class="text-right">
					<!--
          <select name="difficulty">
            <?php foreach (get_difficulties() as $i => $d) : ?>
              <option value="<?= $i; ?>"><?= $d == '' ? 'All Difficulties' : $d; ?></option>
            <?php endforeach; ?>
          </select>
          | -->
					<?php $tags = get_terms( ['taxonomy' => 'category'] ); ?>
					<div class="select-container">
						<select name="tag" class="js-tag-filter">
							<?php foreach ($tags as $i => $tag) : ?>
								<option <?= get_queried_object()->term_id == $tag->term_id ? 'selected' : ''; ?>
												value="<?= $tag->slug; ?>"><?= $tag->name; ?></option>
							<?php endforeach; ?>
						</select>
						<i class="fa fa-caret-down"></i>
					</div>
				</div>
			</div>
			
			
			<?php if (have_posts()) : ?>
				<div class="archive__posts patterns">
					<div class="patterns__container">
						<div class="row">
							<?php while (have_posts()) :
								
								the_post(); ?>
								
								<div class="col col-12 col-sm-6 col-md-4 archive__single">
									<a
										href="<?= get_the_permalink(); ?>"></a>
									
									<div class="row">
										
										<div class="col col-5">
											<div class="background--square"
													 style="background-image: url('<?php the_post_thumbnail_url( 'medium' ); ?>');"></div>
										</div>
										
										<div class="col col-7 archive__single__content">
											<?php $difficulty = get_field( 'difficulty' ); ?>
											<?php if ($difficulty && $difficulty != 0) : ?>
												<div
													class="difficulty difficulty--green difficulty--<?= $difficulty; ?>"></div>
											<?php endif; ?>
											
											<p><?= get_the_date( 'F j, Y' ); ?></p>
											<h3><?= get_the_title(); ?></h3>
										</div>
									</div>
								
								</div>
							
							<?php endwhile; ?>
						
						</div>
					</div>
				</div>
			<?php else : ?>
				<h2>Sorry, we couldn't find anything to match that search.</h2>
			<?php endif; ?>
			
			<div class="archive__pagination">
				<?php the_posts_pagination(); ?>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
	
	</script>

<?php get_footer();