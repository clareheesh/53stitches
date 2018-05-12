<?php get_header(); ?>
  <div class="archive__container">
    <div class="container">
      <div class="row">

        <div class="col col-12 col-md-9">
          <h1 style="margin-bottom: 15px;">Showing results for '<?= $_REQUEST['s']; ?>'</h1>
          <p><small><em><?= $wp_query->found_posts; ?> results</em></small></p>

          <?php if (have_posts()) : ?>
            <div class="archive__posts no-margin patterns">
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
                               style="background-image: url('<?php the_post_thumbnail_url('medium'); ?>');"></div>
                        </div>

                        <div class="col col-7 archive__single__content">
                          <?php $difficulty = get_field('difficulty'); ?>
                          <?php if ($difficulty && $difficulty != 0) : ?>
                            <div
                              class="difficulty difficulty--green difficulty--<?= $difficulty; ?>"></div>
                          <?php endif; ?>

                          <p><?= get_the_date('F j, Y'); ?></p>
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

        <div class="sidebar-content col col-12 col-md-3">
          <?php get_sidebar(); ?>
        </div>
      </div>

    </div><!-- ./container -->
  </div>
<?php get_footer();