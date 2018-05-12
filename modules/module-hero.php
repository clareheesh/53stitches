<?php
$heading = get_sub_field('heading');
$subheading = get_sub_field('subheading');
$content = get_sub_field('content');
$buttons = get_sub_field('buttons');
$image = get_sub_field('image');
$image_as_bg = get_sub_field('image_as_background');
?>

<!-- Hero -->
<div
  class="hero module module-hero <?= $image_as_bg ? 'hero--background-image' : ''; ?>" <?= $image_as_bg ? 'style="background-image: url(' . $image['url'] . ');"' : ''; ?>>
  <div class="overlay"></div>

  <?php if (!$image_as_bg) : ?>
    <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" title="<?= $image['title']; ?>"/>
  <?php endif; ?>

  <div class="container-fluid">
    <h1><?= $heading; ?></h1>
    <p class="difficulty__label"><span class="difficulty difficulty--green difficulty--1"></span> <?= $subheading; ?></p>

    <?php if ($content) : ?>
      <div class="content">
        <p><?= $content; ?></p>
      </div>
    <?php endif; ?>

    <?php if ($buttons && (is_array($buttons) || is_object($buttons))) : ?>
      <?php foreach ($buttons as $button) : ?>
        <?php if (isset($button['link']) && $button['link']) : ?>
          <a href="<?= $button['link']['url']; ?>" class="btn btn-primary read-more"><?= isset($button['text']) && $button['text'] ? $button['text'] : 'See More'; ?></a>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>