<?php

/**
 * The featured image aside content
 *
 * Used on content-catalog.php
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */
$itunesV = get_post_meta(get_the_ID(), 'itunes_video', true);
?>
<aside class="catalog-aside">
	<div class="grid-x">
		<div class="cell medium-10">
			<?php if ($itunesV) : ?>
				<a href="<?php echo $itunesV; ?>" target="_blank" rel="noreferrer" class="apple-link">
					<?php the_post_thumbnail('large', array('sizes' => '(max-width:320px) 145px, (max-width:425px) 220px, 500px')); ?>
				</a>
			<?php else : ?>
				<?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('sizes' => '(max-width:320px) 145px, (max-width:425px) 220px, 500px')); endif; ?>
			<?php endif; ?>
			</div>
		<div class="cell medium-2 no-mobile">
			<div class="grid-x">
				<div class="cell pagination grid-padding-y">
					<?php get_template_part('template-parts/catalog/catalog-pagination'); ?>
				</div>
			</div>
		</div>
	</div>
</aside>