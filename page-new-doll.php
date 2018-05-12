<?php
acf_form_head();
get_header();
?>

    <!----------------------------------------------------------------------------------------------------------------------
    Main Content
    ----------------------------------------------------------------------------------------------------------------------->
    <div class="parent container">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="entry-content col-xs-12">

                <h1><?php the_title(); ?></h1>

                <?php $dolls = get_posts(array(
                    'post_type' => 'doll',
                    'posts_per_page' => -1,
                    'orderby' => 'post_title',
                    'order' => 'ASC',
                )); ?>

                <?= do_shortcode('[gravityform id="1" title="false" description="true" ajax="false"]'); ?>

            </div>

        <?php endwhile; endif; ?>

    </div><!-- ./container -->
<?php get_footer();