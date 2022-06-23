<?php

/**
 * Template part for displaying a catalog post's hero
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles('wp-rig-catalog_buttons');
?>
<div class="entry-buttons">
    <?php
    $itunes_video = get_post_meta(get_the_ID(), 'itunes_video', true);
    $itunes_audio_url = get_post_meta(get_the_ID(), 'itunes_audio_url', true);

    if (get_field('show_video_links')) : ?>
        <?php // REMOVE BELOW after individual link add option is removed
        $youTubeV = get_post_meta(get_the_ID(), 'youtube_video', true);
        $itunesV = get_post_meta(get_the_ID(), 'itunes_video', true);
        $googlePlayV = get_post_meta(get_the_ID(), 'google_play_video', true);
        $amazonV = get_post_meta(get_the_ID(), 'amazon_video', true);
        $steamV = get_post_meta(get_the_ID(), 'steam_video', true);
        $microsoftV = get_post_meta(get_the_ID(), 'microsoft_video', true);
        $vuduV = get_post_meta(get_the_ID(), 'vudu_video', true);
        $vimeoV = get_post_meta(get_the_ID(), 'vimeo_video', true);
        $netflixV = get_post_meta(get_the_ID(), 'netflix_video', true);
        $animalNationV = get_post_meta(get_the_ID(), 'animal_nation_video', true);
        $hooplaV = get_post_meta(get_the_ID(), 'hoopla_video', true);
        $tubiV = get_post_meta(get_the_ID(), 'tubi_video', true);
        $breakerV = get_post_meta(get_the_ID(), 'breaker_video', true);
        $huluV = get_post_meta(get_the_ID(), 'hulu_video', true);
        $epixV = get_post_meta(get_the_ID(), 'epix_video', true);
        $comcastV = get_post_meta(get_the_ID(), 'comcast', true);
        $redboxV = get_post_meta(get_the_ID(), 'redbox', true);
        $walmartV = get_post_meta(get_the_ID(), 'walmart', true);
        $targetV = get_post_meta(get_the_ID(), 'target', true);
        $fandangoV = get_post_meta(get_the_ID(), 'fandango', true);
        $mtv2V = get_post_meta(get_the_ID(), 'mtv2_video', true);
        // REMOVE ABOVE after individual link add option is removed
        ?>
        <div class="entry-buttons__wrapper">
            <h3 class="title h3">
                <?php esc_html_e('Watch Now', 'wp-rig'); ?>
            </h3>
            <?php if ($itunes_video) : ?>
                <a href="<?php echo esc_attr($itunes_video); ?>" class="button apple-link" title="Watch <?php the_title_attribute(); ?> on Apple TV" target="_blank" rel="noreferrer">
                    <strong>
                        <?php esc_html_e('Apple TV', 'wp-rig'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            <?php endif; ?>
            <?php
            // REMOVE BELOW
            // REMOVE BELOW
            // REMOVE BELOW
            // REMOVE BELOW
            ?>
            <?php if ($youTubeV) : ?>

                <a href="<?php echo $youTubeV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $youTubeV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("YouTube", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>

            <?php if ($googlePlayV) : ?>

                <a href="<?php echo $googlePlayV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $googlePlayV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Google Play", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($amazonV) : ?>

                <a href="<?php echo $amazonV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $amazonV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Amazon", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($steamV) : ?>

                <a href="<?php echo $steamV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $steamV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Steam", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($microsoftV) : ?>

                <a href="<?php echo $microsoftV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $microsoftV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Microsoft", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($vuduV) : ?>

                <a href="<?php echo $vuduV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $vuduV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Vudu", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($vimeoV) : ?>

                <a href="<?php echo $vimeoV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $vimeoV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Vimeo", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($netflixV) : ?>

                <a href="<?php echo $netflixV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $netflixV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Netflix", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($animalNationV) : ?>

                <a href="<?php echo $animalNationV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $animalNationV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Animal Nation", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($breakerV) : ?>

                <a href="<?php echo $breakerV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $breakerV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Roku", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>

            <?php if ($huluV) : ?>

                <a href="<?php echo $huluV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $huluV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("HULU", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($epixV) : ?>

                <a href="<?php echo $epixV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $epixV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("EPIX", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($comcastV) : ?>

                <a href="<?php echo $comcastV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $comcastV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Comcast", 'Nacelle'); ?>
                    </strong>
                </a>

            <?php endif; ?>
            <?php if ($redboxV) : ?>

                <a href="<?php echo $redboxV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $redboxV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Redbox", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>

            <?php if ($walmartV) : ?>

                <a href="<?php echo $walmartV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $walmartV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Walmart", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($targetV) : ?>

                <a href="<?php echo $targetV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $targetV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Target", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($fandangoV) : ?>

                <a href="<?php echo $fandangoV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $fandangoV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Fandango", 'Nacelle'); ?>
                    </strong>
                </a>

            <?php endif; ?>
            <?php if ($hooplaV) : ?>

                <a href="<?php echo $hooplaV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $hooplaV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Hoopla", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($mtv2V) : ?>

                <a href="<?php echo $mtv2V; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $mtv2V; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("MTV2", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php if ($tubiV) : ?>

                <a href="<?php echo $tubiV; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $tubiV; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Tubi", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>

            <?php endif; ?>
            <?php
            // REMOVE ABOVE
            // REMOVE ABOVE
            // REMOVE ABOVE
            // REMOVE ABOVE
            // REMOVE ABOVE
            ?>
            <?php if (have_rows('new_large_link')) : ?>
                <?php
                while (have_rows('new_large_link')) :
                    the_row();
                    $video_title = get_sub_field('link_title');
                    $video_link  = get_sub_field('link_url');
                ?>
                    <a href="<?php echo esc_html($video_link); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html($video_title); ?>" target="_blank" rel="noreferrer">
                        <strong><?php echo esc_html($video_title); ?></strong>
                        <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                        </svg>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if (get_field('show_audio_links')) :
        $googlePlayA = get_post_meta(get_the_ID(), 'google_play_audio', true);
        $youTubeA = get_post_meta(get_the_ID(), 'you_tube_audio', true);
        $amazonA = get_post_meta(get_the_ID(), 'amazon_audio', true);
        $spotifyA = get_post_meta(get_the_ID(), 'spotify_audio', true);
        $pandoraA = get_post_meta(get_the_ID(), 'pandora_audio', true);
        $walmartA = get_post_meta(get_the_ID(), 'walmart_audio', true);
        $targetA = get_post_meta(get_the_ID(), 'target_audio', true);
        $fandangoA = get_post_meta(get_the_ID(), 'fandango_audio', true);
        $customA = get_post_meta(get_the_ID(), 'custom_audio', true);
        $customAtitle = get_post_meta(get_the_ID(), 'custom_audio_title', true);
        ?>
        <div class="entry-buttons__wrapper">
            <h3 class="title h3">
                <?php esc_html_e('Listen Now', 'wp-rig'); ?>
            </h3>
            <?php if ($itunes_audio_url) : ?>
                <a href="<?php echo esc_attr($itunes_audio_url); ?>" class="button apple-link" title="Listen <?php the_title_attribute(); ?> on iTunes" target="_blank" rel="noreferrer">
                    <strong>
                        <?php esc_html_e('iTunes', 'wp-rig'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            <?php endif; ?>
            <?php
            // REMOVE BELOW
            // REMOVE BELOW
            // REMOVE BELOW
            // REMOVE BELOW
            ?>
            <?php if ($googlePlayA) : ?>
                <a href="<?php echo $googlePlayA; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $googlePlayA; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Google Play", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            <?php endif; ?>
            <?php if ($youTubeA) : ?>
                <a href="<?php echo $youTubeA; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $youTubeA; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("YouTube Music", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            <?php endif; ?>
            <?php if ($amazonA) : ?>
                <a href="<?php echo $amazonA; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $amazonA; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Amazon", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            <?php endif; ?>
            <?php if ($spotifyA) : ?>
                <a href="<?php echo $spotifyA; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $spotifyA; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Spotify", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            <?php endif; ?>
            <?php if ($pandoraA) : ?>
                <a href="<?php echo $pandoraA; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $pandoraA; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Pandora", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            <?php endif; ?>
            <?php if ($walmartA) : ?>
                <a href="<?php echo $walmartA; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $walmartA; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Walmart", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            <?php endif; ?>
            <?php if ($targetA) : ?>
                <a href="<?php echo $targetA; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $targetA; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Target", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            <?php endif; ?>
            <?php if ($fandangoA) : ?>
                <a href="<?php echo $fandangoA; ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo $fandangoA; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php _e("Fandango", 'Nacelle'); ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            <?php endif; ?>
            <?php
            // REMOVE ABOVE
            // REMOVE ABOVE
            // REMOVE ABOVE
            // REMOVE ABOVE
            // REMOVE ABOVE
            ?>
            <?php if (have_rows('audio_new_large_link')) : ?>
                <?php
                while (have_rows('audio_new_large_link')) :
                    the_row();
                    $audio_title = get_sub_field('audio_link_title');
                    $audio_link  = get_sub_field('audio_link_url');
                ?>
                    <a href="<?php echo esc_html($audio_link); ?>" class="button" title="Watch <?php the_title_attribute(); ?> on <?php echo esc_html($audio_title); ?>" target="_blank" rel="noreferrer">
                        <strong><?php echo esc_html($audio_title); ?></strong>
                        <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                        </svg>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
