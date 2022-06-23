<?php
/**
 * Template part for displaying a catalog post's crew
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$imdbv = get_post_meta( get_the_ID(), 'imdb_video', true );
?>

<div class="crew-title__wrapper">
	<h2 class="crew-title__catalog"><span class="crew-title">CREDITS</span></h2>
	<?php if ( ! empty( $imdbv ) ) : ?>
	<a href="<?php echo wp_kses( $imdbv, 'post' ); ?>" class="button crew-title__button" title="Watch <?php the_title_attribute(); ?> on <?php echo wp_kses( $imdbv, 'post' ); ?>" target="_blank">
		<strong><?php esc_html_e( 'View on IMDB', 'wp-rig' ); ?></strong>
		<?php get_template_part( 'template-parts/svg/icon-external-link' ); ?>
	</a>
	<?php endif; ?>
</div>
<dl class="dl-list dl-list__crew">
	<?php wp_rig()->display_tax_terms( 'main_talent' ); ?>

	<?php wp_rig()->display_tax_terms( 'directors' ); ?>

	<?php wp_rig()->display_tax_terms( 'producers' ); ?>

	<?php wp_rig()->display_tax_terms( 'writers' ); ?>

	<?php get_template_part( 'template-parts/catalog/parts/catalog_stats', get_post_type() ); ?>
</dl>
