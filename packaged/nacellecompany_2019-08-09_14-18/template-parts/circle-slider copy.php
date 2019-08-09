<?php
$post_objects = get_field('press_posts');
if ($post_objects) : ?>
    <?php foreach ($post_objects as $post) : // variable must be called $post (IMPORTANT) 
        ?>
        <?php //setup_postdata($post); 
        ?>


        <li class="is-active orbit-slide">
            <div class="grid-x align-center">
                <?php the_field('link_to_article', $post_object->ID); ?>
                
                <a href="<?php the_field('link_to_article', $post_object->ID); ?>" target="_blank">
                    <div class="large-4 press-title-container columns">
                        <div class="press-title-inner-container">
                            <h3 class="press-title"><?php echo get_the_title(); ?></h3>
                        </div>
                    </div>
                </a>

                <div class="large-4 orbit-image-container columns">
                    <img class="orbit-image" data-interchange="[<?php the_post_thumbnail_url('featured-small'); ?>, small], [<?php the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php the_post_thumbnail_url('featured-large'); ?>, large], [<?php the_post_thumbnail_url('fp-xlarge'); ?>, xlarge]" />
                </div>

                <div class="large-4 next-image-container columns">
                </div>

            </div>
        </li>

    <?php endforeach; ?>
    <?php //wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
    ?>

<?php endif; ?>