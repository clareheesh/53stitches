<?php
	$posts = get_sub_field('posts');
	
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
						<?php if (count($posts) === 1) : ?>
							<?php $single = $posts[0]; ?>
                  <div class="col col-12 col-md-8">
                      <div class="featured-post__image label-container">
												<?php if (strtotime(get_the_date('Y-m-d', $single)) > strtotime('today - 1 month')) : ?>
                            <span class="label label--new">New</span>
												<?php endif; ?>
												<?= get_the_post_thumbnail($single, 'full'); ?>
                      </div>
                  </div>

                  <div class="col col-12 col-md-4">
                      <div class="featured-post__content">
                          <h2><a href="<?= get_post_permalink($single); ?>"><?= get_the_title($single); ?></a></h2>

                          <a class="read-more" href="<?= get_post_permalink($single); ?>">Read More <i class="fa fa-caret-right"></i></a>
												
												<?= wpautop(get_the_excerpt($single)); ?>
												
												<?php $difficulty = get_field('difficulty', $single); ?>
												<?php if ($difficulty) : ?>
                            <div title="<?= $difficulties[$difficulty]; ?>" class="featured-post__difficulty">
                                <span class="difficulty difficulty--green difficulty--<?= $difficulty; ?>"></span>
                                <span><?= $difficulties[$difficulty]; ?></span>
                            </div>
												<?php endif; ?>
                      </div>
                  </div>
						
						<?php else : ?>
							
							<?php foreach ($posts as $single) : ?>
                      <div class="col">

                          <div class="featured-post__single-post single-post">
                              <div class="single-post__image label-container"
                                   style="background-image:url('<?= get_the_post_thumbnail_url($single, 'full'); ?>');">
                                  <a href="<?= get_the_permalink($single); ?>"></a>
																<?php if (strtotime(get_the_date('Y-m-d', $single)) > strtotime('today - 1 month')) : ?>
                                    <span class="label label--new">New</span>
																<?php endif; ?>
                              </div>

                              <div class="single-post__content">
                                  <h2><a href="<?= get_the_permalink(); ?>"><?= get_the_title($single); ?></a></h2>

                                  <p class="subtitle">Subtitle</p>
																
																<?= wpautop(get_the_excerpt($single)); ?>
                              </div>
                          </div>

                      </div>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php endif; ?>
        </div>

    </div>
</div>