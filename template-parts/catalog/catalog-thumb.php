<?php // <div class="cell medium-2 mb-4 mb-medium-5 mb-medium-4 mb-large-5 mb-xlarge-3"> ?>

<div class="grid-item grid-item-<?php echo $count; ?>">

    <div class="cell dark-container">

        <a href="<?php the_permalink(); ?>">

            <div class="callout" data-callout-hover-reveal>

                <div class="callout-body">

                    <?php
                    $image = get_field('square_image');

                    if (!empty($image)) : ?>

                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                    <?php endif; ?>

                </div>

                <div class="callout-footer">

                    <p>

                        <?php $summary = get_field('synopsis', $post->ID);
                        echo $summary; ?>

                    </p>

                </div>

            </div>

        </a>

    </div>

</div>