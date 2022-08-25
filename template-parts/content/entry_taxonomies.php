<?php
/**
 * Template part for displaying a post's taxonomy terms
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$taxonomies = wp_list_filter(
	get_object_taxonomies( $post, 'objects' ),
	array(
		'public' => true,
	)
);

?>
<div class="entry-taxonomies">
	<?php
	if ( is_post_type_archive() ) {
		if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
			rank_math_the_breadcrumbs();
		}
	} else {
		// Show terms for all taxonomies associated with the post.
		foreach ( $taxonomies as $taxonomy ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

			/* translators: separator between taxonomy terms */
			$separator = _x( ', ', 'list item separator', 'wp-rig' );
			switch ( $taxonomy->name ) {
				case 'category':
					$class = 'category-links term-links';
					$list  = get_the_category_list( esc_html( $separator ), '', $post->ID );
					/* translators: %s: list of taxonomy terms */
					$placeholder_text = __( 'Category: %s', 'wp-rig' );
					break;
				case 'post_tag':
					$class = 'tag-links term-links';
					$list  = get_the_tag_list( '', esc_html( $separator ), '', $post->ID );
					/* translators: %s: list of taxonomy terms */
					$placeholder_text = __( 'Tagged %s', 'wp-rig' );
					break;
				default:
					$class            = str_replace( '_', '-', $taxonomy->name ) . '-links term-links';
					$tax_terms        = get_the_term_list( $post->ID, $taxonomy->name, '', esc_html( $separator ), '' );
					$tax_name         = $taxonomy->label;
					$placeholder_text = __( $tax_name . ": %s", 'wp-rig' );
					$list             = $tax_terms;
			}

			if ( empty( $list ) ) {
				continue;
			}
			?>
			<span class="<?php echo esc_attr( $class ); ?>">
				<?php
				printf(
					esc_html( $placeholder_text ),
					$list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
				?>
			</span><span>|</span>
			<?php
		}
	}
	?>
</div>
