<?php
get_header();
?>

    <!----------------------------------------------------------------------------------------------------------------------
    Main Content
    ----------------------------------------------------------------------------------------------------------------------->
    <div class="parent container">

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <?php if( !is_user_logged_in() ) : ?>

                <p>Sorry, you must be logged in to see this content.</p>

            <?php else : ?>

                <div class="entry-content col-xs-12">

                    <h1><?php the_title(); ?></h1>

                    <?php $dolls = get_posts( array(
                                                  'post_type' => 'doll',
                                                  'posts_per_page' => -1,
                                                  'orderby' => 'post_title',
                                                  'order' => 'ASC',
                                              ) ); ?>

                    <?php $total = 0; ?>
                    <?php $possible_profit = 0; ?>

                    <?php if( $dolls && ( is_array( $dolls ) || is_object( $dolls ) ) ) :
                        foreach( $dolls as $doll ) :
                            $stock = intval( get_post_meta( $doll->ID, 'stock', true ) );
                            $possible_profit += $stock * intval( get_post_meta( $doll->ID, 'price', true ) );

                            $total += $stock;
                        endforeach;
                    endif; ?>

                    <div class="row">

                        <div class="stock-tally col-xs-6 col-sm-3">
                            <a id="stock_level" class="btn btn-success btn-block btn-stock" href="#"><span class="i"><span class="i"><?= $total; ?></span></span><br>Dolls in Stock</a>
                        </div>

                        <div class="stock-tally col-xs-6 col-sm-3">
                            <a id="max_value" class="btn btn-info btn-block btn-stock" href="#"><i class="fa fa-4x fa-dollar"> </i><br>Max value is $<?= $possible_profit; ?>
                            </a>
                        </div>

                        <div class="stock-tally col-xs-6 col-sm-3">

                            <?php
                            $days_since = strtotime( '21st April 2017' );
                            $now = strtotime( 'now' );
                            $diff = $days_since - $now;
                            $days_to_supanova = floor( $diff / ( 60 * 60 * 24 ) );
                            ?>

                            <a href="<?= site_url(); ?>/supanova" class="btn btn-warning btn-block btn-stock"><i class="fa fa-clock-o fa-4x"></i><br><?= $days_to_supanova; ?> Days until Supanova</a>
                        </div>

                        <div class="stock-tally col-xs-6 col-sm-3">
                            <a id="sync_etsy" class="btn btn-primary btn-block btn-stock" href="#"><i class="fa fa-4x fa-cloud-download"> </i><br>Sync with Etsy</a>
                        </div>
                    </div>

                    <?php if( $dolls && ( is_array( $dolls ) || is_object( $dolls ) ) ) : ?>
                        <div class="table-responsive">
                            <table id="dolls" class="table table-striped table-hover" cellspacing="0" width="100%">

                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Etsy ID</th>
                                    <th>Price</th>
                                    <th>Date Listed</th>
                                    <th>Doll Link</th>
                                    <th>Pattern Link</th>
                                    <th>Sales</th>
                                    <th>Favourites</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Etsy ID</th>
                                    <th>Price</th>
                                    <th>Date Listed</th>
                                    <th>Doll Link</th>
                                    <th>Pattern Link</th>
                                    <th>Sales</th>
                                    <th>Favourites</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach( $dolls as $key => $doll ) : ?>

                                    <?php
                                    $etsy_id = get_post_meta( $doll->ID, 'etsy_id', true );
                                    $name = $doll->post_title;
                                    $price = get_post_meta( $doll->ID, 'price', true );
                                    $date_listed = get_post_meta( $doll->ID, 'date_listed', true );
                                    $doll_link = get_post_meta( $doll->ID, 'doll_link', true );
                                    $pattern_link = get_post_meta( $doll->ID, 'pattern_link', true );
                                    $sales = get_post_meta( $doll->ID, 'sales', true );
                                    $favourites = get_post_meta( $doll->ID, 'favourites', true );
                                    $stock = get_post_meta( $doll->ID, 'stock', true );
                                    $status = get_post_meta( $doll->ID, 'status', true );
                                    $tags = get_the_tags( $doll->ID );
                                    $views = get_post_meta( $doll->ID, 'views', true );
                                    ?>

                                    <?php
                                    if( $date_listed ) :
                                        $days_since = strtotime( str_replace( '/', '-', $date_listed ) );
                                        $now = strtotime( 'now' );
                                        $diff = $now - $days_since;
                                        $weeks = floor( $diff / ( 60 * 60 * 24 * 7 ) );
                                    endif;

                                    if( $weeks ) {
                                        $avg_favourites = round( $favourites / $weeks, 2 );
                                        $avg_views = round( $views / $weeks, 2 );
                                    } else {
                                        $avg_favourites = 0;
                                        $avg_views = 0;
                                    }
                                    ?>

                                    <tr class="doll-<?= $doll->ID; ?>">
                                        <td class="name" data-val="<?= $name; ?>"><a href="<?= get_the_permalink( $doll->ID ); ?>"><?= $name; ?></a>
                                        </td>
                                        <td class="etsy_id" data-val="<?= $etsy_id; ?>"><?= $etsy_id; ?></td>
                                        <td class="price" data-val="<?= $price; ?>"><?= $price; ?></td>
                                        <td class="date_listed" data-val="<?= $days_since; ?>"><?= $date_listed; ?></td>
                                        <td class="doll_link" data-val="<?= $doll_link; ?>"><?= $doll_link ? '<a href="' . $doll_link . '" target="_blank" rel="nofollow">Doll Link</a>' : ''; ?></td>
                                        <td class="pattern_link" data-val="<?= $pattern_link; ?>"><?= $pattern_link ? '<a href="' . $pattern_link . '" target="_blank" rel="nofollow">Pattern Link</a>' : ''; ?></td>
                                        <td class="sales" data-val="<?= $sales; ?>"><?= $sales; ?></td>
                                        <td class="favourites" data-toggle="tooltip" data-placement="right" title="Total: <?= $favourites; ?>" data-val="<?= $favourites; ?>"><?= $avg_favourites; ?></td>
                                        <td data-toggle="tooltip" data-placement="right" title="Total: <?= $views; ?>"><?= $avg_views; ?></td>
                                        <td class="status" data-val="<?= $status; ?>"><?= $status; ?></td>
                                        <td class="text-right">
                                            <a class="btn btn-success edit-doll" href="#" data-perm="<?= get_the_permalink( $doll->ID ); ?>" data-id="<?= $doll->ID; ?>">Edit</a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>

                </div>

            <?php endif; ?>
        
        <?php endwhile; endif; ?>

    </div><!-- ./container -->
<?php get_footer();