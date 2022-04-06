<?php
/**
 * Template part for News post content.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$the_thumbnail = get_the_post_thumbnail(
	$post->ID,
	'medium'
);
$the_link      = get_post_meta( get_the_ID(), 'link_to_article', true );
$the_title     = get_the_title();

if ( has_post_thumbnail() ) : ?>
	<a href="<?php echo esc_html( $the_link ); ?>" target="_blank">
		<?php echo wp_kses( $the_thumbnail, 'post' ); ?>
	</a>
<?php endif; ?>
<a href="<?php echo esc_html( $the_link ); ?>" target="_blank">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<h4><?php _e( 'Read more', 'wp-rig' ); ?>
		<svg class="icon" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
			<path d="M16.875 12.5h-1.25a.625.625 0 00-.625.625V17.5H2.5V5h5.625c.345 0 .625-.28.625-.625v-1.25a.625.625 0 00-.625-.625h-6.25C.839 2.5 0 3.34 0 4.375v13.75C0 19.161.84 20 1.875 20h13.75c1.036 0 1.875-.84 1.875-1.875v-5a.625.625 0 00-.625-.625zM19.063 0h-5c-.835 0-1.252 1.012-.665 1.602l1.396 1.395-9.52 9.517a.938.938 0 000 1.329l.885.884a.937.937 0 001.328 0l9.516-9.52 1.395 1.395c.586.585 1.602.175 1.602-.665v-5A.937.937 0 0019.062 0z" fill-rule="nonzero" />
		</svg>
	</h4>
</a>
<?php the_content(); ?>
<?php get_template_part( 'template-parts/modules/social-share' ); ?>
<hr>
