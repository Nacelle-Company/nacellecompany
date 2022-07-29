<?php
/**
 * Template part for displaying a catalog post's crew
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<h2 class="crew-title">CREDITS</h2>
<dl class="crew-list people">
	<?php wp_rig()->display_tax_terms( 'main_talent' ); ?>

	<?php wp_rig()->display_tax_terms( 'directors' ); ?>

	<?php wp_rig()->display_tax_terms( 'producers' ); ?>

	<?php wp_rig()->display_tax_terms( 'writers' ); ?>
</dl>
<dl class="crew-list data">
	<?php get_template_part( 'template-parts/catalog/parts/catalog_stats', get_post_type() ); ?>
</dl>
