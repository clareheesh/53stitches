<?php get_header(); ?>

  <!----------------------------------------------------------------------------------------------------------------------
  Main Content
  ----------------------------------------------------------------------------------------------------------------------->
  <div class="parent container">

    <div class="row">
      <div class="col col-md-9 col-12">
        <div class="entry-content <?= $show_thumbnail ? 'with-image' : ''; ?>">

          <?php if (have_rows('modules')) : ?>

            <?php while (have_rows('modules')) : the_row(); ?>

              <?php
              // Get the row layout and call the corresponding template file
              $layout = get_row_layout();
              get_template_part('modules/module', $layout)
              ?>

            <?php endwhile; ?>

          <?php else : ?>

            <?php get_template_part('templates/content'); ?>

          <?php endif; ?>

        </div>
      </div>

      <div class="col col-md-3 col-12">
        <div class="sidebar-content">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>

  </div><!-- ./container -->
<?php get_footer();