<?php
/**
 * Template part for displaying a catalog post's header
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<header class="entry-header">
	<div class="entry-title__wrapper">
		<?php
		/**
		 * Title and content
		 */
		get_template_part( 'template-parts/content/entry_title', get_post_type() );
		get_template_part( 'template-parts/content/entry_content', get_post_type() );
		?>
	</div>
	<div class="entry-header__breadcrumbs">
		<?php
		// ? breadcrumbs
		if ( function_exists( 'rank_math_the_breadcrumbs' ) || get_field( 'theatres_popup' ) ) {
			if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
				rank_math_the_breadcrumbs();}
		}
		// ? social icons
		get_template_part( 'temlate-parts/content/entry-social', get_post_type() );
		// ? theaters popup
		// if ( get_field( 'theatres_popup' ) ) {
		// get_template_part( 'template-parts/content/entry_tickets-modal', get_post_type() );
		// }
		?>
	</div>
</header><!-- .entry-header -->
