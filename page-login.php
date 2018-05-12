<?php get_header(); ?>

    <!----------------------------------------------------------------------------------------------------------------------
    Main Content
    ----------------------------------------------------------------------------------------------------------------------->
    <div class="parent container">

        <div class="col-xs-12 col-sm-9">
            <div class="entry-content">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php if (is_user_logged_in()) : ?>

                        <h1 class="text-center">Logout</h1>

                        <p class="text-center">You are already logged in. Would you like to <a
                                href="<?= wp_logout_url(); ?>">logout</a>?</p>

                    <?php else : ?>

                        <h1 class="text-center">Login</h1>

                        <?php wp_login_form(); ?>

                    <?php endif; ?>

                <?php endwhile; endif; ?>

            </div>
        </div>

        <div class="col-sm-3 col-xs-12">
            <div class="sidebar-content">

                <?php get_sidebar(); ?>

            </div>
        </div>

    </div><!-- ./container -->
<?php get_footer();