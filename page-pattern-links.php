<?php
get_header();
?>
	
	<!----------------------------------------------------------------------------------------------------------------------
	Main Content
	----------------------------------------------------------------------------------------------------------------------->
	<div class="parent container">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php if (!is_user_logged_in()) : ?>
				
				<p>Sorry, you must be logged in to see this content.</p>
			
			<?php else : ?>
				
				<div class="entry-content col-xs-12">
					
					<h1><?php the_title(); ?></h1>
					
					<?php if (have_rows( 'modules' )) : ?>
						
						<?php while (have_rows( 'modules' )) : the_row(); ?>
							
							<?php
							// Get the row layout and call the corresponding template file
							$layout = get_row_layout();
							
							if ($layout == 'faq') {
								
								$questions = get_sub_field( 'questions' );
								?>
								
								<!-- FAQ -->
								<div class="faq-module module checkboxes">
									<?php if ($questions && (is_array( $questions ) || is_object( $questions ))) : ?>
										
										<div class="row">
											<?php foreach ($questions as $i => $question) : ?>
												
												<?php
												$label = $question['question'];
												$link = $question['answer'];
												?>
												
												<?= $i != 0 && $i % 4 == 0 ? '<div class="row">' : ''; ?>
												
												<div class="col-xs-6 col-sm-3">
													
													<p style="margin-bottom: 0;">
														<small>
															<input
																id="patterns<?= $i; ?>"
																type="checkbox"
																name="patterns[]"
																value="<?= $link; ?>"
															/>
															<label for="patterns<?= $i; ?>"><?= $label; ?> </label>
														</small>
													</p>
												
												</div>
												
												<?= $i % 4 == 3 ? '</div>' : ''; ?>
											
											<?php endforeach; ?>
										</div>
										
										<div class="col-xs-12 text-center">
											<hr>
											<a href="#" id="generate_and_copy" class="btn btn-primary btn-sm">Generate and Copy</a>
										</div>
										
										<div class="col-xs-12">
											<div class="well">
												<hr>
												<div id="copy">
													
													<p>Hello,</p>
													
													<p>Thanks so much for your purchase! Here are the patterns you
														requested. If you have any problems or questions feel free
														to
														contact me, enjoy~</p>
													
													<div id="patterns">
													
													</div>
													
													<p>You can find the Techniques file here if you're unsure of any
														of
														the
														stitches or method that I use:</p>
													
													<p>https://www.dropbox.com/s/6sqgml0yz3gyg8n/Techniques.pdf</p>
													
													<p>If you are using a Windows 8 or 10 computer or laptop, the
														default
														PDF reader doesn't display the text properly for some
														reason. To
														fix
														this problem, simply use Adobe Reader (available free here:
														get.adobe.com/reader/) or any of the other free PDF readers
														available on the Windows Store.</p>
													
													<p>Thanks again,<br>
														Clare</p>
												
												</div>
											</div>
										</div>
									
									<?php endif; ?>
								
								</div>
								
								<?php
								
							} else {
								get_template_part( 'modules/module', $layout );
							}
							?>
						
						<?php endwhile; ?>
					
					<?php else : ?>
						
						<?php get_template_part( 'templates/content' ); ?>
					
					<?php endif; ?>
				
				</div>
			
			<?php endif; ?>
		
		<?php endwhile; endif; ?>
	
	</div><!-- ./container -->
<?php get_footer();