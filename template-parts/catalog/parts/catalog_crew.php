<?php
/**
 * Template part for displaying a catalog post's crew
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="entry-main__crew">

	<div class="crew__title">
		<h2><?php single_post_title(); ?></h2>
		<h4>Credits</h4>
	</div>
	<dl class="dl-list dl-list__crew">
		<?php wp_rig()->display_tax_terms( 'main_talent' ); ?>

		<?php wp_rig()->display_tax_terms( 'directors' ); ?>

		<?php wp_rig()->display_tax_terms( 'producers' ); ?>

		<?php wp_rig()->display_tax_terms( 'writers' ); ?>
	</dl>
</div>
