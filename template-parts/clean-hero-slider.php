<div class="orbit clean-hero-slider" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out; timerDelay: 6000">

    <div class="orbit-wrapper">
        <div class="orbit-controls">
            <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
            <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
        </div>

        <ul class="orbit-container">

            <?php

            /*
            *  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
            *  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
            *  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
            */

            $post_objects = get_field('home_feat_posts');

            if ($post_objects) : ?>
            <?php foreach ($post_objects as $post) : // variable must be called $post (IMPORTANT) 
                    ?>
            <?php setup_postdata($post); ?>

            <li class="orbit-slide">
                <figure class="orbit-figure">
                    <?php

                            $img_size_lg = 'fp-large';
                            $img_size_md = 'fp-medium';
                            $img_size_sm = 'fp-small';

                            $image = get_field('home_image');
                            $squareImage = get_field('square_image');

                            $hero_image_alt = $image['alt']; /* Get image object alt */
                            $hero_square_image_alt = $squareImage['alt'];

                            /* Get custom sizes of our image sub_field */
                            $hero_lg = $image['sizes'][$img_size_lg];
                            $hero_md = $image['sizes'][$img_size_md];
                            $hero_sm = $image['sizes'][$img_size_sm];

                            $hero_square_lg = $squareImage['sizes'][$img_size_lg];
                            $hero_square_md = $squareImage['sizes'][$img_size_md];
                            $hero_square_sm = $squareImage['sizes'][$img_size_sm];

                            ?>

                    <!-- large background image -->
                    <img class="orbit-image" data-interchange="[<?php echo $hero_lg; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
                    <noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

                    <div class="orbit-cover">

                    </div>

                    <figcaption class="orbit-caption">
                        <!-- small image -->
                        <a href="<?php the_permalink(); ?>">
                            <img class="orbit-sm-image" data-interchange="[<?php echo $hero_square_sm; ?>, default], [<?php echo $hero_square_sm; ?>, small], [<?php echo $hero_square_md; ?>, medium], [<?php echo $hero_square_lg; ?>, large]" alt="<?php echo $hero_square_image_alt; ?>" />
                        </a>
                        <noscript><img src="<?php echo $hero_square_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

                        <a href="<?php the_permalink(); ?>">
                            <h3><?php echo get_the_title(); ?></h3>
                        </a>
                        <?php the_excerpt(); ?>
                    </figcaption>
                </figure>
            </li>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
                ?>
            <?php endif; ?>
        </ul>
    </div>

</div>