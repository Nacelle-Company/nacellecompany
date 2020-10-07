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

<!-- back to top -->
<!-- https://codepen.io/adventuresinmissions/pen/suzKB -->
<a href="#0" class="to-top">Top</a>

<footer class="shrink footer">
  <div class="footer-container">
    <div class="footer-grid grid-x align-middle">

      <?php if (is_active_sidebar('l-footer-widgets')) : ?>
        <div class="cell medium-4 l-footer-widgets">
          <?php dynamic_sidebar('l-footer-widgets'); ?>
        </div>
      <?php endif; ?>

      <div class="cell medium-4 c-footer-widgets">
        <?php if (is_active_sidebar('c-footer-widgets')) : ?>
          <?php dynamic_sidebar('c-footer-widgets'); ?>
        <?php endif; ?>
      </div>

      <div class="cell medium-4 r-footer-widgets">
        <?php if (is_active_sidebar('r-footer-widgets')) : ?>
          <?php get_template_part('template-parts/blocks/widget-custom'); 
          ?>
          <?php dynamic_sidebar('r-footer-widgets'); ?>
        <?php endif; ?>
      </div>

    </div>
  </div>




  <script>
    function onPlayerReady(event) {
      $('.bounce').click(function() {
        ytPlayer.playVideo();
      });
    }
  </script>
  <!-- products modal -->
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
  </div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>


</body>

</html>