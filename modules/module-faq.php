<?php

$questions = get_sub_field('questions');

?>

<!-- FAQ -->
<div class="faq-module module">
    <?php if ($questions && (is_array($questions) || is_object($questions))) : ?>
        <div class="container">
            <div class="col-xs-12">
                <div class="accordion" role="tablist" aria-multiselectable="true">

                    <?php foreach ($questions as $i => $q) : ?>
                        <?php $question = $q['question']; ?>
                        <?php $answer = apply_filters('the_content', $q['answer']); ?>
                        <hr>
                        <p>
                            <strong><a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i; ?>"
                               aria-expanded="true" aria-controls="collapseOne">
                                <?= $question; ?>
                            </a></strong>
                        </p>

                        <div id="collapse<?= $i; ?>" class="collapse <?= $i == 0 ? '' : ''; ?>" role="tabpanel"
                             aria-labelledby="headingOne">
                            <?= $answer; ?>
                        </div>
                        <hr>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
</div>