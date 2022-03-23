<?php
/**
 * Template part for displaying the header branding
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>
<?php if ( get_theme_mod( 'site_branding' ) ) : ?>
<div class="site-branding">
	<?php if ( get_theme_mod( 'custom_logo' ) ) : ?>

		<?php the_custom_logo(); ?>

	<?php endif; ?>

	<?php

	if ( get_theme_mod( 'show_site_title' ) ) {
		if ( is_front_page() && is_home() ) {
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
		} else {
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
		}
	}
	?>

	<?php
	if ( get_theme_mod( 'show_tagline' ) ) {
		$wp_rig_description = get_bloginfo( 'description', 'display' );
		if ( $wp_rig_description || is_customize_preview() ) {
			?>
			<p class="site-description">
				<?php echo $wp_rig_description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
			</p>
			<?php
		}
	}
	?>
</div><!-- .site-branding -->
<?php endif; ?>
