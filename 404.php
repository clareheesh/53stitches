<?php get_header(); ?>

  <!----------------------------------------------------------------------------------------------------------------------
  Main Content
  ----------------------------------------------------------------------------------------------------------------------->
  <div class="parent container">

    <div class="row">

      <div class="col col-md-9 col-12">
        <div class="entry-content">

          <h1>404 Not Found</h1>

          <p>Sorry, something went wrong and we couldn't find the page you were looking for. Try searching
            below.</p>

          <?php get_search_form(); ?>

        </div>
      </div>

      <div class="col col-12 col-md-3">
        <div class="sidebar-content">

          <?php get_sidebar(); ?>

        </div>
      </div>
    </div>

  </div><!-- ./container -->
<?php get_footer();