<?php $count = 0; ?>

<?php $post_objects = get_field('home_circle_post');

if ($post_objects) : ?>

<?php foreach ($post_objects as $post_object) : $count++; ?>

<?php
$img_size_lg = 'fp-large';
$img_size_md = 'fp-medium';
$img_size_sm = 'fp-small';
$image = get_field('home_image', $post_object->ID);
$hero_image_alt = $image['alt']; /* Get image object alt */
/* Get custom sizes of our image sub_field */
$hero_lg = $image['sizes'][$img_size_lg];
$hero_md = $image['sizes'][$img_size_md];
$hero_sm = $image['sizes'][$img_size_sm];
?>

<?php // if is the first home image add a class ?>
<?php if ($count == 1) : ?>

    <?php // first home images class ?>
    <div class="first-home-images no-mobile cell">

        <?php // . . . and print the home-image ?>
        <div class="home-image">

            <a href="<?php echo get_permalink($post_object->ID); ?>">

                <?php // Hook up Interchange as an img src ?>
                <img rel="preconnect" class="my-hero superman" data-interchange="[<?php echo $hero_md; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_md; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />

                <noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

            </a>

        </div>

        <?php // if is the third image add the orbit carousel and a new class ?>
    <?php elseif ($count == 3) : ?>

        <?php // HOME IMAGES . . . new class ?>
        <div class="last-home-images no-mobile cell">

            <?php // continue showing the home_image posts ?>
            <div class="home-image">

                <a href="<?php echo get_permalink($post_object->ID); ?>">

                    <?php // Hook up Interchange as an img src ?>
                    <img rel="preconnect" class="my-hero superman" data-interchange="[<?php echo $hero_md; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_md; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
                    <noscript><img rel="preconnect" src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

                </a>

            </div>

            <?php // otherwise print the home-image ?>
        <?php else : ?>

            <?php // continue showing the home_image posts ?>
            <div class="home-image">

                <a href="<?php echo get_permalink($post_object->ID); ?>">

                    <?php // Hook up Interchange as an img src ?>
                    <img class="my-hero superman" data-interchange="[<?php echo $hero_md; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_md; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />

                    <noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

                </a>

            </div>

        </div>

    <?php endif; ?>

<?php endforeach; ?>

    </div> <?php // closing last-home-images ?>

<?php endif; ?>