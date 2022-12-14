<?php
/**
 * Template part for displaying the page content when a 404 error has occurred
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-page' );
?>
<img src="<?php bloginfo( 'template_directory' ); ?>/assets/images/bamford-is-sad-you-are-on-404-page.webp" class="img-404" alt="404 image" />

<div class="page-content entry-content content-width">
	<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) {
			?>
			<p>
				<h3>Hmmm, looks like nothing is here.</h3>
				<?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wp-rig' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>
			</p>
			<?php
		} elseif ( is_search() ) {
			?>
			<p>
				<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wp-rig' ); ?>
			</p>
			<?php
		} else {
			?>
			<p>
				<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp-rig' ); ?>
			</p>
			<?php
		}
		get_search_form();
	?>

	<h2>
		<?php echo sprintf( esc_html__( 'Maybe try one of these? %1$s', 'wp-rig' ), convert_smilies( ':)' ) ); ?>
	</h2>
	<div class="button-wrap">
		<a href="<?php bloginfo( 'url' ); ?>" class="button button-icon">
			<?php echo load_inline_svg('icon-home.svg'); ?>
			<span>Home</span>
			<?php get_template_part( 'template-parts/svg/icon', 'home' ); ?>
		</a>

		<a href="<?php bloginfo( 'url' ); ?>/catalog" class="button button-icon">
			<?php echo load_inline_svg('icon-catalog.svg'); ?>
			<span>Catalog</span>
		</a>

		<a href="<?php bloginfo( 'url' ); ?>/press" class="button button-icon">
			<?php echo load_inline_svg('icon-press.svg'); ?>
			<span>Press / News</span>
		</a>
	</div>
	<div class="widget widget_categories">
		<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'wp-rig' ); ?></h2>
		<ul>
		<?php
		wp_list_categories(
			array(
				'orderby'    => 'count',
				'order'      => 'DESC',
				'show_count' => 1,
				'title_li'   => '',
				'number'     => 10,
			)
		);
		?>
		</ul>
	</div>
</div>
