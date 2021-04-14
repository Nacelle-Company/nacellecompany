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

<footer class="grid-x grid-padding-x">
  <!-- <div class="footer-container"> -->
  <div class="footer-container cell small-12 flex-container flex-dir-column large-flex-dir-row">

    <?php if (is_active_sidebar('l-footer-widgets')) : ?>
      <div class="flex-container large-flex-child-shrink l-footer-widgets align-center">
        <?php dynamic_sidebar('l-footer-widgets'); ?>
      </div>
    <?php endif; ?>

    <div class="flex-container large-flex-child-auto c-footer-widgets align-center-middle">
      <?php if (is_active_sidebar('c-footer-widgets')) : ?>
        <?php dynamic_sidebar('c-footer-widgets'); ?>
      <?php endif; ?>
    </div>

    <div class="flex-container flex-child-shrink r-footer-widgets align-center-middle">
      <?php if (is_active_sidebar('r-footer-widgets')) : ?>
        <?php get_template_part('template-parts/blocks/widget-custom'); ?>
        <?php dynamic_sidebar('r-footer-widgets'); ?>
      <?php endif; ?>
    </div>

  </div>
  <!-- </div> -->


  <script>
    jQuery(function() {
      jQuery("#video-header-hero").YTPlayer();
      jQuery("#bigVideoHero").YTPlayer();
      jQuery("#modal-video").YTPlayer();
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
    <?php the_field('synopsis'); ?>
    <button class="close-button" data-close aria-label="Close reveal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php // products modal 
  ?>
  <div class="reveal productsModal" id="productsModal" data-reveal>
    <div class="embed-container">
      <?php the_field('featured_video'); ?>
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