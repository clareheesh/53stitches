<?php
$content = get_sub_field('content');

// Style
$bg_color = get_sub_field('bg_color');
$align_text = get_sub_field('text_align');
?>

<div class="module module--text module--<?= $bg_color; ?> <?= $align_text; ?>">
    <div class="container container--narrow">
        <div class="row">
            <div class="col">
                <?= $content; ?>
            </div>
        </div>
    </div>
</div>