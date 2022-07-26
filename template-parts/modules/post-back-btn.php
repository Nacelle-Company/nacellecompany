<?php
$queried_obj = get_queried_object();
$obj_slug    = $queried_obj->post_type;
?>
<style>
    .post-back-btn {
        display: flex;
        justify-content: center;
    }
    .post-back-btn .icon {
        margin-right: 0.5em;
    }
</style>
<div class="post-back-btn">
    <a class="button button-return" href="<?php echo wp_kses( get_post_type_archive_link( $obj_slug ), 'post' ); ?>"><svg class="icon" width="7" height="11" xmlns="http://www.w3.org/2000/svg"><path d="M6.01.972v8.652c0 .599-.725.899-1.148.475L.535 5.773a.673.673 0 010-.95L4.862.495A.672.672 0 016.01.972z" fill="#000" fill-rule="nonzero" /></svg>Return to <?php echo esc_html( $post_type_name ); ?> Archive</a>
</div>
