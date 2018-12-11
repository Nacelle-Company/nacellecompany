<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */
?>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid grid-x align-center-middle small-up-1 medium-up-3">
            <?php dynamic_sidebar('l-footer-widgets');?>
            <?php dynamic_sidebar('c-footer-widgets');?>
            <?php dynamic_sidebar('r-footer-widgets');?>
        </div>
    </div>
</footer>
<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer();?>
</body>
</html>
