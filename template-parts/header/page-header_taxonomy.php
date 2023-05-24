<?php
/**
 * Template part for displaying a post's header
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$category_icon = load_inline_svg( 'icon-catalog.svg' );
$queried_object = get_queried_object();
$queried_object_taxonomy = $queried_object->taxonomy;
$taxonomy = get_taxonomy($queried_object_taxonomy);
$archive_tax_name = $taxonomy->labels->singular_name;
?>
<header class="page-header page-header__taxonomy">
	<div class="page-title__wrap">
		<div class="subtitle">
			<sub>
				<?php echo esc_html($archive_tax_name); ?>
			</sub>
		</div>
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
