<div class="absolute-container">

    <div class="grid-x">

        <?php // variables
        $post_objects = get_field('home_feat_posts');
        $numberRepeat = 0;
        $rangeNumber = get_field('range');

        if ($post_objects) : ?>

            <?php foreach ($post_objects as $post_object) : ?>

                <div class="cell small-3 medium-2 img-container">

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

                    <?php // Hook up Interchange as an img src 
                    ?>
                    <img class="my-hero superman" data-interchange="[<?php echo $hero_lg; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]" alt="<?php echo $hero_image_alt; ?>" alt="<?php echo $hero_image_alt; ?>" />
                    <noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

                </div>

                <?php $numberRepeat++; ?>

                <?php if ($rangeNumber < $numberRepeat) {
                    break;
                } ?>

                <?php foreach ($post_objects as $post_object) : ?>

                    <div class="cell small-3 medium-2 img-container">

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

                        <?php // Hook up Interchange as an img src 
                        ?>
                        <img class="my-hero superman" data-interchange="[<?php echo $hero_lg; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
                        <noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

                    </div>

                <?php endforeach; ?>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</div>