<?php
/**
 * The taxonomy template file
 *
 * For talent, producers, directors, writers ext.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content', 'wp-rig-post-grid' );

?>
	<main id="primary" class="site-main">
		<?php
		if ( have_posts() ) {

			get_template_part( 'template-parts/content/page_header' );
			?>
			<div class="archive-main post-grid">
				<?php
				while ( have_posts() ) {
					the_post();
					wp_rig()->display_tax_posts();
				}
				?>
			</div>
			<?php
			if ( ! is_singular() ) {
				get_template_part( 'template-parts/content/pagination' );
			}
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
get_footer();
