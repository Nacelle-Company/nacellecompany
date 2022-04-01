<?php
/**
 * The template for displaying related catalog posts on a single catalog page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-catalog_related' );

$ids = get_field( 'related_catalog_items', false, false );
if ( $ids ) :
	$catalog_query = new \WP_Query(
		array(
			'post_type'       => 'catalog',
			'post__in'        => $ids,
			'posts_per_page'  => -1,
		)
	);
	$pr_query      = new \WP_Query(
		array(
			'post_type'       => 'press_release',
			'post__in'        => $ids,
			'posts_per_page'  => -1,
		)
	);
	$news_query    = new \WP_Query(
		array(
			'post_type'       => 'news',
			'post__in'        => $ids,
			'posts_per_page'  => -1,
		)
	);
	?>
	<footer class="grid catalog-related">
		<header class="title">
			<h3>RELATED INFO</h3>
		</header>
		<?php
		// ? get each post type's # of posts
		$catalog_post_count = $catalog_query->post_count;
		$pr_post_count      = $pr_query->post_count;
		$news_post_count    = $news_query->post_count;
		$post_count_all     = 0;
		// ? if post type has posts add one to $post_count_all variable
		if ( $catalog_post_count > 0 ) {
			$post_count_all++;
		}
		if ( $pr_post_count > 0 ) {
			$post_count_all++;
		}
		if ( $news_post_count > 0 ) {
			$post_count_all++;
		}
		// ? if only one post type on medium-up screens make layout 3 columns
		if ( 1 === $post_count_all ) {
			$columns  = 'medium-4';
			$margin_x = ' grid-margin-x';
		} elseif ( 2 === $post_count_all ) {
			$columns  = 'medium-6';
			$margin_x = ' related-cpt-wrapper';
		} else { // ? otherwise do full width
			$columns  = 'medium-12';
			$margin_x = '';
		}
		?>
		<?php
		if ( $pr_query->have_posts() ) :
			$count = 0;
			?>
			<div class="wrap<?php echo esc_html( $margin_x ); ?>">
			<?php
			while ( $pr_query->have_posts() ) :
				$pr_query->the_post();
				$count++;
				$the_title     = get_the_title();
				$permalink     = get_permalink();
				$the_post_type = get_post_type_object( get_post_type() );
				$the_post_type = strtoupper( $the_post_type->labels->singular_name );
				?>
				<?php if ( 1 === $count ) : ?>
				<h4 class="title">
						<?php echo esc_html( $the_post_type ); ?>
				</h4>
						<?php
				endif; // ? CARDS
				?>
				<a href="<?php echo wp_kses( $permalink, 'post' ); ?>" class="grid <?php echo wp_kses( $columns, 'post' ); ?>">
					<p><?php echo wp_kses( $the_title, 'post' ); ?></p>
					<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
				</a>
				<?php endwhile; ?>
			</div>

		<?php endif; ?>
		<?php
		if ( $catalog_query->have_posts() ) :
			$count = 0;
			?>

			<div class="wrap<?php echo esc_html( $margin_x ); ?>">
			<?php
			while ( $catalog_query->have_posts() ) :
				$catalog_query->the_post();
				$count++;
				$the_title     = get_the_title();
				$permalink     = get_permalink();
				$the_post_type = get_post_type_object( get_post_type() );
				$the_post_type = strtoupper( $the_post_type->labels->singular_name );
				?>
				<?php if ( 1 === $count ) : ?>
				<h4 class="title">
						<?php echo esc_html( $the_post_type ); ?>
				</h4>
						<?php
				endif; // ? CARDS
				?>
				<a href="<?php echo wp_kses( $permalink, 'post' ); ?>" class="grid <?php echo wp_kses( $columns, 'post' ); ?>">
						<p><?php echo wp_kses( $the_title, 'post' ); ?></p>
					<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
				</a>
				<?php endwhile; ?>
			</div>

		<?php endif; ?>
		<?php
		if ( $news_query->have_posts() ) :
			$count = 0;
			?>

			<div class="wrap<?php echo esc_html( $margin_x ); ?>">
			<?php
			while ( $news_query->have_posts() ) :
				$news_query->the_post();
				$count++;
				$the_title     = get_the_title();
				$permalink     = get_permalink();
				$the_post_type = get_post_type_object( get_post_type() );
				$the_post_type = strtoupper( $the_post_type->labels->singular_name );
				?>
				<?php if ( 1 === $count ) : ?>
				<h4 class="title">
						<?php echo esc_html( $the_post_type ); ?>
				</h4>
						<?php
				endif;
				?>
				<a href="<?php echo wp_kses( $permalink, 'post' ); ?>" class="grid <?php echo wp_kses( $columns, 'post' ); ?>">
					<p><?php echo wp_kses( $the_title, 'post' ); ?></p>
					<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
				</a>
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</footer>
	<?php
endif;
