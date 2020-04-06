<?php
get_header();
?>
	<!----------------------------------------------------------------------------------------------------------------------
	Main Content
	----------------------------------------------------------------------------------------------------------------------->
	<div class="parent container">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php date_default_timezone_set( 'Australia/Brisbane' ); ?>
			
			<div class="entry-content col-xs-12">
				
				<?php $dolls = get_posts( array('post_type' => 'doll', 'posts_per_page' => -1, 'orderby' => 'post_title', 'order' => 'ASC',) ); ?>
				
				<?php $total = 0; ?>
				<?php $possible_profit = 0; ?>
				<?php $proposed_profit = 0; ?>
				<?php $ideal = 0; ?>
				<?php $frozen = 0; ?>
				<?php $blank = 0; ?>
				
				<?php if ($dolls && (is_array( $dolls ) || is_object( $dolls ))) :
					foreach ($dolls as $doll) :
						
						$status = get_post_meta( $doll->ID, 'status', true );
						
						if (strtolower( $status ) == 'inactive') {
							$frozen++;
						} else {
							
							$stock = intval( get_post_meta( $doll->ID, 'stock', true ) );
							$ideal_s = intval( get_post_meta( $doll->ID, 'ideal_stock', true ) ) - $stock;
							$possible_profit += $stock * (intval( get_post_meta( $doll->ID, 'price', true ) ));
							
							if ($stock == 0) {
								$blank++;
							}
							
							$total += $stock;
							if ($ideal_s > 0) {
								$ideal += $ideal_s;
								$proposed_profit += $ideal_s * (intval( get_post_meta( $doll->ID, 'price', true ) ));
							} elseif (!isset( $ideal_s )) {
								// Automatically give each non-inactive doll an ideal stock of at least 1
								$ideal++;
							}
						}
					endforeach;
				endif; ?>
				
				<h1>
					<?php the_title(); ?>: <?= count( $dolls ) == 1 ? '1 doll' : count( $dolls ) . ' dolls'; ?><br>
					<small>Dolls with 0 stock: <?= $blank; ?></small>
				</h1>
				<div class="content">
					<?php the_content(); ?>
				</div>
				
				<div class="row">
					
					<!-- Dolls Remaining - Difference between ideal stock and actual stock -->
					<!-- Value of actual stock -->
					<!-- Value of intended stock -->
					<!-- Days until Supanova (estimated dolls during that time at the rate of 3 per week -->
					
					<?php
					$days_since = strtotime( '21st April 2017' );
					$now = strtotime( 'now' );
					$diff = $days_since - $now;
					$days_to_supanova = floor( $diff / (60 * 60 * 24) );
					?>
					
					<div class="stock-tally col-xs-6 col-sm-4 col-md-2">
						<!-- Dolls in Stock -->
						<a id="stock_level" class="btn btn-default btn-success btn-block btn-stock" href="#"><span class="i"><?= $total; ?></span><br>Dolls
							in Stock Currently</a>
					</div>
					
					<div class="stock-tally col-xs-6 col-sm-4 col-md-2">
						<a id="max_value" class="btn btn-default btn-info btn-block btn-stock" href="#"><span class="i">$<?= $possible_profit; ?></span><br>Maximum
							Possible Value
						</a>
					</div>
					
					<div class="stock-tally col-xs-6 col-sm-4 col-md-2">
						<a id="dolls_remaining"
							 class="btn btn-default <?= $ideal > $days_to_supanova ? 'btn-danger' : 'btn-success'; ?> btn-block btn-stock" href="#"><span
								class="i"><?= $ideal; ?></span><br>Dolls Remaining</a>
					</div>
					
					<div class="stock-tally col-xs-6 col-sm-4 col-md-2">
						<a id="proposed_value" class="btn btn-default btn-block btn-info btn-stock" href="#"><span
								class="i">$<?= $proposed_profit; ?></span><br>Value of Ideal Stock</a>
					</div>
					
					<div class="stock-tally col-xs-6 col-sm-4 col-md-2">
						<a href="#" class="btn btn-default btn-block btn-warning btn-stock"><span class="i"><?= $days_to_supanova; ?></span><br> Days
							until Supanova</a>
					</div>
					
					<div class="stock-tally col-xs-6 col-sm-4 col-md-2">
						<?php $dolls_per_week = $ideal / ($days_to_supanova / 7); ?>
						<?php $dolls_per_day = $ideal / ($days_to_supanova); ?>
						<a id="dolls_per_day" class="btn btn-primary btn-default btn-block btn-stock" href="#"><span class="i"
																																																				 title="<?= round( $dolls_per_day, 2 ); ?>"><?= round( $dolls_per_day, 2 ); ?></span>
							<br>Dolls per Day
							<small><?= $frozen; ?> inactive</small>
						</a>
					</div>
				</div>
				
				<?php if ($dolls && (is_array( $dolls ) || is_object( $dolls ))) : ?>
					<div class="table-responsive">
						<table id="dolls" class="table table-striped table-hover" cellspacing="0" width="100%">
							
							<thead>
							<tr>
								<th>Tier</th>
								<th>Name</th>
								<th>Price</th>
								<th>Ideal Stock</th>
								<th>Actual Stock</th>
								<th>Avg Views</th>
								<th>Avg Favs</th>
								<th>Favs per View</th>
								<th>On Order</th>
								<th>Update</th>
							</tr>
							</thead>
							<tfoot>
							<tr>
								<th>Tier</th>
								<th>Name</th>
								<th>Price</th>
								<th>Ideal Stock</th>
								<th>Actual Stock</th>
								<th>Avg Views</th>
								<th>Avg Favs</th>
								<th>Views per Fav</th>
								<th>On Order</th>
								<th>Update</th>
							</tr>
							</tfoot>
							<tbody>
							<?php foreach ($dolls as $key => $doll) : ?>
								
								<?php
								$rank = get_post_meta( $doll->ID, 'rank', true );
								$tier = get_post_meta( $doll->ID, 'tier', true );
								$name = $doll->post_title;
								$price = intval( get_post_meta( $doll->ID, 'price', true ) );
								$date_listed = get_post_meta( $doll->ID, 'date_listed', true );
								$sales = get_post_meta( $doll->ID, 'sales', true );
								$favourites = get_post_meta( $doll->ID, 'favourites', true );
								$stock = get_post_meta( $doll->ID, 'stock', true );
								$ideal_stock = get_post_meta( $doll->ID, 'ideal_stock', true );
								$views = get_post_meta( $doll->ID, 'views', true );
								$status = get_post_meta( $doll->ID, 'status', true );
								$views_per_fav = $favourites ? round( $views / $favourites ) : 0;
								$on_order = get_post_meta( $doll->ID, 'on_order', true );
								?>
								
								<?php
								if ($date_listed) :
									$days_since = strtotime( str_replace( '/', '-', $date_listed ) );
									$now = strtotime( 'now' );
									$diff = $now - $days_since;
									$weeks = floor( $diff / (60 * 60 * 24 * 7) );
								endif;
								
								if (isset( $weeks ) && $weeks) {
									$avg_favourites = round( $favourites / $weeks, 2 );
									$avg_views = round( $views / $weeks, 2 );
								} else {
									$avg_favourites = 0;
									$avg_views = 0;
								}
								
								$inactive = get_post_meta( $doll->ID, 'status', true ) == 'inactive' ? true : false;
								?>
								
								<?php if (!$inactive) : ?>
									
									<tr
										class="doll-<?= $doll->ID; ?> <?= $stock >= $ideal_stock ? 'table-success' : ''; ?> <?= $stock < $ideal_stock ? 'table-focus' : ''; ?> <?= $stock == 0 ? 'table-warning' : ''; ?> <?= $on_order > 0 ? 'table-order' : ''; ?>">
										<td class="tier" data-val="<?= $tier; ?>"><?= $tier; ?></td>
										<td class="name" data-val="<?= $name; ?>">
											<a href="<?= get_the_permalink( $doll->ID ); ?>"><?= $name; ?></a></td>
										<td class="price" data-val="<?= $price; ?>"><?= $price; ?></td>
										<td class="ideal_stock" data-val="<?= $ideal_stock; ?>"><?= $ideal_stock; ?></td>
										<td class="stock" data-val="<?= $stock; ?>"><?= $stock; ?></td>
										<td class="avg_views" data-toggle="tooltip" data-placement="right"
												title="Total: <?= $views; ?>"><?= $avg_views; ?></td>
										<td class="avg_favourites" data-toggle="tooltip" data-placement="right" title="Total: <?= $favourites; ?>"
												data-val="<?= $favourites; ?>"><?= $avg_favourites; ?></td>
										<td class="favs_per_view" data-val="<?= $views_per_fav ?>"><?= $views_per_fav; ?></td>
										<td class="on_order" data-val="<?= $on_order ?>"><?= $on_order; ?></td>
										<td class="text-right">
											<a class="btn btn-success edit-doll" href="#" data-perm="<?= get_the_permalink( $doll->ID ); ?>"
												 data-id="<?= $doll->ID; ?>">Edit</a>
										</td>
									</tr>
								
								<?php endif; ?>
							
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php endif; ?>
			
			</div>
		
		<?php endwhile; endif; ?>
	
	</div><!-- ./container -->
<?php get_footer();