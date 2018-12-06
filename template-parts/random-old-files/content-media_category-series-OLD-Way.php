<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */

?>
<?php
// vars
$filmText = get_field('film_text', 'category_307');
$postThumb = get_the_post_thumbnail();
$post_objects = get_field('film_post_one', 'category_307');

$queried_object = get_queried_object();

$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
 ?>

<!-- FILM TEXT -->
<?php
echo '<pre>';
    var_dump($postThumb);
echo '</pre>';

?>
<!-- end FILM TEXT -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php $my_query = new WP_Query('post_type=catalog&nopaging=1');
            if ($my_query->have_posts()): ?>
            <h1><?php echo the_field('film_text', 'category_307');?></h1>

			<?php
            $post_objects = get_field('film_post_one', 'category_307');

             if ($post_objects): ?>
				 <?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT)?>
					<?php setup_postdata($post); ?>

						<?php
                        $feat_image = get_field('featured_image');
                        if (!empty($feat_image)): ?>
							<?php $feat_image;?>
				 		<?php endif?>

				 <?php endforeach ?>


			<?php endif ?>
			<?php endif ?>
		<?php //the_content();?>
		<?php edit_post_link(__('(Edit)', 'comedy-dynamics'), '<span class="edit-link">', '</span>'); ?>
	</div>
	<footer>
		<?php
            wp_link_pages(
                array(
                    'before' => '<nav id="page-nav"><p>' . __('Pages:', 'comedy-dynamics'),
                    'after'  => '</p></nav>',
                )
            );
        ?>
		<?php $tag = get_the_tags(); if ($tag) {
            ?><p><?php the_tags(); ?></p><?php
        } ?>
	</footer>
</article>
