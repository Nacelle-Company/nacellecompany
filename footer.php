<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */
?>

<?php // back to top 
?>
<?php // https://codepen.io/adventuresinmissions/pen/suzKB 
?>
<a href="#0" class="to-top">Top</a>

<footer>
  <div class="footer-container grid-x grid-padding-x large-flex-dir-row align-justify">

    <?php if (is_active_sidebar('l-footer-widgets')) : ?>
      <div class="cell large-4 l-footer-widgets mt-2 mt-large-0 flex-container align-center-middle">
        <?php dynamic_sidebar('l-footer-widgets'); ?>
      </div>
    <?php endif; ?>
    <?php if (is_active_sidebar('c-footer-widgets')) : ?>
      <div class="cell large-4 c-footer-widgets flex-container align-center-middle">
        <?php dynamic_sidebar('c-footer-widgets'); ?>
      </div>
    <?php endif; ?>
    <?php if (is_active_sidebar('r-footer-widgets')) : ?>
      <div class="cell large-4 r-footer-widgets flex-container align-center-middle">
        <?php get_template_part('template-parts/blocks/widget-custom'); ?>
        <?php dynamic_sidebar('r-footer-widgets'); ?>
      </div>
    <?php endif; ?>

  </div>

  <script>
    jQuery(function() {
      jQuery("#video-header-hero").YTPlayer();
      jQuery("#bigVideoHero").YTPlayer();
      jQuery("#modal-video").YTPlayer();
      jQuery("#mobile_video").YTPlayer();
      jQuery("#modal-video-container").YTPlayer();
      jQuery("#fullHeroVideo").YTPlayer();
      jQuery("#modal-hero-video").YTPlayer();
      jQuery("#modal-video").YTPlayer();
    });
  </script>

  <script>
    function onPlayerReady(event) {
      $('.bounce').click(function() {
        ytPlayer.playVideo();
      });
    }
  </script>
  <script src="https://www.youtube.com/iframe_api"></script>

  <?php // catalog item synopsis modal 
  ?>
  <div class="small synopsis reveal" id="exampleModal5" data-reveal>
    <?php
    if (get_the_content()) {
      $synopsis = get_the_content();
    } else {
      $synopsis = get_post_meta($post->ID, 'synopsis', true);
    }
    echo $synopsis; ?>
    <button class="close-button" data-close aria-label="Close reveal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php // products modal 
  ?>
  <div class="reveal productsModal" id="productsModal" data-reveal>
    <div class="embed-container">
      <?php echo get_post_meta(get_the_ID(), 'featured_video', true); ?>
    </div>
    <button class="close-button" data-close aria-label="Close reveal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

</footer>
<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
  </div><?php // Close off-canvas content 
        ?>
<?php endif; ?>

<?php wp_footer(); ?>


</body>

</html>