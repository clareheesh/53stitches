<?php
	$posts = get_sub_field('featured_items');
	
	// Style
	$bg_color = get_sub_field('bg_color');
	
	// Difficulty
	$difficulties = get_difficulties();
?>

<!-- Featured Pages -->
<div class="module module--<?= $bg_color; ?> module--featured-post featured-post section">
    <div class="container">

        <div class="row">
					<?php if ($posts && (is_object($posts) || is_array($posts))) : ?>
						<?php foreach ($posts as $single) : ?>

                  <div class="col">

                      <div class="featured-post__single-post single-post">
                          <div class="single-post__image label-container"
                               style="background-image:url('<?= $single['image']['url']; ?>');">
                              <a href="<?= get_the_permalink($single); ?>"></a>
                          </div>

                          <div class="single-post__content">
                              <h2><a href="<?= $single['link']['url']; ?>"><?= $single['heading'] ?></a></h2>

                              <p class="subtitle"><?= $single['subtitle']; ?></p>
														
														<?= wpautop($single['content']); ?>
                          </div>
                      </div>

                  </div>
						<?php endforeach; ?>
					<?php endif; ?>
        </div>

    </div>
</div>