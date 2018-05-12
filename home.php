<?php get_header(); ?>

    <div class="parent container">

        <div class="row">

            <div class="col-sm-9 col-12">
                <div class="entry-content">
                    
                    <h1>Patterns</h1>
                    <?php $count = 0; ?>

                    <?php if (have_posts()) : ?>
                        <div class="row">
                            <?php while (have_posts()) :
                                the_post(); ?>
                                <?php $count++; ?>

                                <?php $count % 4 == 0 ? '<hr>' : ''; ?>

                                <div class="col-sm-3 col-12">
                                    <div class="single-archive text-center">
                                        <a href="<?= get_the_permalink(); ?>/">
                                            <div class="image-container" style="background-image: url('<?= the_post_thumbnail_url(); ?>');"></div>
                                        </a>

                                        <h5><a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></h5>
                                        <p><small><em><?= get_the_date(); ?></em></small></p>
                                    </div>
                                </div>

                            <?php endwhile; ?>

                            <?php the_posts_pagination( ); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <div class="col-sm-3 col-12">
                <div class="sidebar-content">

                    <?php get_sidebar(); ?>

                </div>
            </div>
        </div>

    </div><!-- ./content --> 
<?php get_footer();