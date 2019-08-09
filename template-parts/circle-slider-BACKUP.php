<div class="grid-x">
    <div class="cell">


        <div class="ecommerce-hero-slider-small orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-auto-play="false">
            <ul class="orbit-container" id="circle-posts">
            <?php

            /*
            *  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
            *  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
            *  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
            */

            $post_objects = get_field('press_posts');

            if( $post_objects ): ?>

            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>

                <li class="is-active orbit-slide">
                    <div class="hero-slider-slide">
                        <div class="grid-x align-center">

                            <div class="small-12 medium-3 large-3 columns">
                                <div class="hero-slider-slide-content">

                                    <a href="<?php the_permalink(); ?>">
                                        <div class="title-circle">
                                            <h3 class="press-title"><?php echo get_the_title( ); ?></h3>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="image-circle small-12 medium-6 large-4 columns">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                                        <img class="orbit-image" data-interchange="[<?php the_post_thumbnail_url( 'featured-small' ); ?>, small], [<?php the_post_thumbnail_url( 'featured-medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'featured-large' ); ?>, large], [<?php the_post_thumbnail_url( 'featured-xlarge' ); ?>, xlarge]" />
                                    <?php endif; ?>
                                </a>
                            </div>


                <?php endforeach; ?>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>

                            <div class="grid-x align-center">

                                <div class="small-12 medium-3 large-3 columns">
                                    <div class="hero-slider-slide-content">

                                        <a href="<?php the_permalink(); ?>">
                                            <div class="title-circle">
                                                <h3 class="press-title"><?php echo get_the_title( ); ?></h3>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <div class="image-circle small-12 medium-6 large-4 columns">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                                            <img class="orbit-image" data-interchange="[<?php the_post_thumbnail_url( 'featured-small' ); ?>, small], [<?php the_post_thumbnail_url( 'featured-medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'featured-large' ); ?>, large], [<?php the_post_thumbnail_url( 'featured-xlarge' ); ?>, xlarge]" />
                                        <?php endif; ?>
                                    </a>
                                </div>

                         </div>
                     </li>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

            </ul>
            <?php endif; ?>
        </div>
    </div>
</div>



<!-- from front.php -->

<?php $post_objects = get_field('press_posts');

if( $post_objects ): ?>

    <ul>

        <?php foreach( $post_objects as $post_object): ?>

            <li><?php the_field('title', $post_object->ID); ?></li>

        <?php endforeach; ?>

    </ul>

<?php endif; ?>
