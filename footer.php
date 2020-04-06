<div class="footer-instagram">
	<div class="container">
		<div class="row align-items-end">
			<div class="col-12 col-md-3">
				<ul class="social">
					<li><i class="fa fa-instagram"></i></li>
				</ul>
				<p><a target="_blank" rel="nofollow" href="//instagram.com/53stitches/">@53stitches</a></p>
				<p>Keep up to date with new projects and works.</p>
			</div>
			
			<div class="col-12 col-md-9">
				<?= do_shortcode( '[show_instagram]' ); ?>
			</div>
		</div>
	</div>
</div>

<footer>
	<div class="container">
		<div class="row align-items-end">
			<div class="col col-12 col-md-3">
				<h4>Never miss out</h4>
				
				<?php get_template_part( 'templates/mailchimp' ); ?>
				
				<!--        <form>-->
				<!--          <input type="email" name="subscribe" placeholder="Enter your email address"/>-->
				<!--          <input type="submit" class="btn btn--primary" value="Subscribe"/>-->
				<!--        </form>-->
			</div>
			
			<div class="col col-12 col-md-6">
				<h4>Other Projects</h4>
				
				<p class="two-freckles">
					<a href="https://twofreckls.etsy.com" target="_blank" rel="nofollow">
						<img src="<?= get_stylesheet_directory_uri(); ?>/assets/img/twofreckls.png" alt="Two Freckls"/>
						Two Freckls
					</a>
				</p>
				
				<p>Hand-painted laser cut bamboo jewellery made by two freckly sisters - myself and my little sister</p>
			</div>
			
			<div class="col col-12 col-md-3">
				<ul class="social">
					<li><a href="//www.ravelry.com/designers/clare-heesh" rel="nofollow" target="_blank"><i class="fa fa-ravelry"></i></a></li>
					<li><a href="//www.facebook.com/fiftythreestitches/" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="//www.instagram.com/53stitches/" rel="nofollow" target="_blank"><i class="fa fa-instagram"></i></li>
					<li><a href="//www.53stitches.tumblr.com/" rel="nofollow" target="_blank"><i class="fa fa-tumblr"></i></a></li>
					<li><a href="//www.53stitches.etsy.com/" rel="nofollow" target="_blank"><i class="fa fa-etsy"></i></a></li>
				</ul>
				<p class="text-right"><small><a href="<?= get_site_url(); ?>/privacy-policy">Privacy Policy</a></small></p>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>