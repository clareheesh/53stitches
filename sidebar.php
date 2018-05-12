<div id="sidebar">

  <div class="sidebar__section sidebar__section--border sidebar__about-me">
    <img src="<?= get_stylesheet_directory_uri(); ?>/assets/img/about.png" alt="About me"/>

    <h5>About Me</h5>

    <p>I started 53stitches in 2014 after being inspired by some amazing (I now realise) knitted dolls. I made my first
      little crocheted monkey doll a couple of weeks later, and then I was hooked for good.</p>

    <p>This blog is a chance to give back to the wonderful community that provided so many free patterns and tutorials
      when I was starting out.</p>
  </div>
  
  <div class="sidebar__section sidebar__search">
    <?php get_search_form(); ?>
  </div>

  <div class="sidebar__section sidebar__kofi kofi">
    <p>I'm able to keep this blog free thanks to your continued support, please consider buying me a coffee!</p>
    <script type='text/javascript' src='//ko-fi.com/widgets/widget_2.js'></script>
    <script type='text/javascript'>kofiwidget2.init('Buy Me a Coffee', '#FFD8DB', 'M4M0CMVC');
      kofiwidget2.draw();</script>
  </div>

<!--  <div class="sidebar__section goog">-->
<!--    Ad-->
<!--  </div>-->

  <div class="sidebar__section sidebar__section--border sidebar__etsy">
    <ul class="social">
      <li><h5><a href="//53stitches.etsy.com" target="_blank" rel="nofollow"><i class="fa fa-etsy"></i> Find me on Etsy</a>
        </h5></li>
    </ul>
  </div>

  <div class="sidebar__section sidebar__section--border sidebar__subscribe">
    <h5>Don't miss out</h5>

    <?php get_template_part('templates/mailchimp'); ?>
  </div>

<!--  <div class="sidebar__section goog">-->
<!--    Ad-->
<!--  </div>-->

  <?php $related = get_field('related', $post); ?>
  <?php if ($related && (is_array($related) || is_object($related))) : ?>
    <div class="sidebar__section sidebar__section--border sidebar__you-might-like">
      <h5>You might like</h5>

      <?php foreach ($related as $r) : ?>
        <div class="sidebar__related" style="background-image: url('<?= get_the_post_thumbnail_url($r); ?>');">
          <a href="<?= get_the_permalink($r); ?>"><?= get_the_title($r); ?></a>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</div><!-- ./sidebar -->