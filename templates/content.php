<?php if (!have_posts()) : ?>
    <!-- There are no posts -->
    <h4>Sorry, there are no posts to display. </h4>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php if (has_post_thumbnail() && get_field('hide_thumbnail') !== true) : ?>
          <div class="main-image" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>');"></div>
			<?php endif; ?>
			
			<?php $format = get_post_format(); ?>

        <h1 class="entry-title post-title <?= is_front_page() ? 'text-center' : ''; ?>">
					<?= is_front_page() ? '53stitches' : get_the_title(); ?>
        </h1>

        <!-- display excerpts if the page is an archive or search, otherwise display the content -->
			<?php if (is_archive() || is_search()) : ?>
				<?php the_excerpt(); ?>
			<?php else: ?>
				<?php the_content(); ?>
			<?php endif; ?>

        <div class="meta">
            <p><small><?php the_tags(); ?></small></p>
					<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>

        </div>
			
			<?php get_template_part('content', 'comments'); ?>

    </div>

<?php endwhile; ?>

<?php the_posts_pagination(); ?>