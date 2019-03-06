<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
// if (has_post_thumbnail($post->ID)) :?>
		<header class="featured-hero contact" role="banner" data-interchange="[<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]">
	        <div class="grid-x">
			    <div class="cell">
			    	<h1 class="text-center">Obsessed with us yet?</h1>
			    </div>
			</div>
		</header>
<?php //endif;
