<?php
$img_size_lg = 'fp-large';
$img_size_md = 'fp-medium';
$img_size_sm = 'fp-small';

$hero_image = get_field('press_release_header', 'option');

/* Get custom sizes of our image sub_field */
$hero_lg = $hero_image['sizes'][ $img_size_lg ];
$hero_md = $hero_image['sizes'][ $img_size_md ];
$hero_sm = $hero_image['sizes'][ $img_size_sm ];

if (!empty('press_release_header')): ?>

	<header class="featured-hero" role="banner" data-interchange="[<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]">

	</header>

<?php endif;
