<?php
/**
 * Template part for displaying a catalog post's crew
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;
$the_title = get_the_title();
$colon = ": ";

?>
<?php if(strpos($the_title, $colon) !== false) : ?>
	<div class="crew-title">
		<?php $the_title = substr($the_title, strpos($the_title, ":") + 1); ?>
		<h3 class="subtitle h6" style="margin-bottom: 0;">
			<?php echo esc_html($the_title); ?>
		</h3>
		<h4 class="h2" style="margin: 0;">CREDITS</h4>
	</div>
<?php else : ?>
	<h2 class="crew-title">CREDITS</h2>
<?php endif; ?>
<dl class="crew-list people">
	<?php wp_rig()->display_tax_terms( 'main_talent' ); ?>

	<?php wp_rig()->display_tax_terms( 'directors' ); ?>

	<?php wp_rig()->display_tax_terms( 'producers' ); ?>

	<?php wp_rig()->display_tax_terms( 'writers' ); ?>

	<?php wp_rig()->display_tax_terms( 'authors' ); ?>

	<?php get_template_part( 'template-parts/content/entry_catalog_stats', get_post_type() ); ?>

</dl>
