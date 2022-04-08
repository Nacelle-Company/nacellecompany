<?php
/**
 * Template part for displaying a catalog post's crew
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$imdbv = get_post_meta( get_the_ID(), 'imdb_video', true );
?>

<div class="entry-main__crew">

	<div class="crew-title__wrapper">
		<h2 class="crew-title__catalog"><?php single_post_title(); ?><br><span class="crew-title">CREDITS</span></h2>

		<a href="<?php echo wp_kses( $imdbv, 'post' ); ?>" class="button crew-title__button" rel="noreferrer" title="Watch <?php the_title_attribute(); ?> on <?php echo wp_kses( $imdbv, 'post' ); ?>" target="_blank" rel="noreferrer">
			<strong><?php esc_html_e( 'View on IMDB', 'wp-rig' ); ?></strong>
			<?php get_template_part( 'template-parts/svg/icon-external-link' ); ?>
		</a>
	</div>
	<dl class="dl-list dl-list__crew">
		<?php wp_rig()->display_tax_terms( 'main_talent' ); ?>

		<?php wp_rig()->display_tax_terms( 'directors' ); ?>

		<?php wp_rig()->display_tax_terms( 'producers' ); ?>

		<?php wp_rig()->display_tax_terms( 'writers' ); ?>
	</dl>
</div>
