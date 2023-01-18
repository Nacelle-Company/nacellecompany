<?php
/**
 * Template part for displaying a post's header
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$category_icon = load_inline_svg( 'icon-catalog.svg' );
?>

<header class="page-header">
	<div class="page-title__wrap">
		<h1 class="page-title">
			<?php echo single_term_title( $category_icon ); ?>
		</h1>
	</div>
</header><!-- .entry-header -->
<?php if(!empty(term_description())) : ?>
	<div class="page-header__intro">
		<div class="page-header__intro__wrap">
			<?php echo term_description(); ?>
		</div>
	</div>
<?php endif; ?>
