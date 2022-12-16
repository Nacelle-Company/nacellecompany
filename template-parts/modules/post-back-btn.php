<?php
$queried_obj = get_queried_object();
$obj_slug    = $queried_obj->post_type;
$the_post_type  = get_post_type_object( get_post_type( $queried_obj ) );
$post_type_name = $the_post_type->labels->singular_name;
?>

<div class="post-back-btn">
	<a class="button button-return" href="<?php echo wp_kses( get_post_type_archive_link( $obj_slug ), 'post' ); ?>">
		< Return to <?php echo esc_html( $post_type_name ); ?> Archive
	</a>
</div>
