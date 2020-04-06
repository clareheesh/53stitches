<?php
	
	$patterns = get_sub_field('patterns');

?>

<div class="module module--patterns patterns section">
    <div class="patterns__container">
			<?php if ($patterns && (is_object($patterns) || is_array($patterns))) : ?>
				<?php foreach ($patterns as $i => $pattern) : ?>
              <div class="patterns__single <?= (count($patterns) % 2 == 1 && $i == 0) ? 'patterns__single--large' : ''; ?>"
                   style="background-image: url('<?= get_the_post_thumbnail_url($pattern, 'full'); ?>');">
                  <a href="<?= get_the_permalink($pattern); ?>"></a>

                  <div class="patterns__details">
                      <h3><?= get_the_title($pattern); ?></h3>
                      <p><?= get_the_date('F j, Y', $pattern); ?></p>
										
										<?php $difficulty = get_field('difficulty', $pattern); ?>
										<?php if ($difficulty) : ?>
                        <div class="difficulty difficulty--<?= $difficulty; ?>"></div>
										<?php endif; ?>
                  </div>

              </div>
				<?php endforeach; ?>
			<?php endif; ?>
    </div>
</div>
