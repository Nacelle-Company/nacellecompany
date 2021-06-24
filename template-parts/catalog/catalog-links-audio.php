<?php
$itunesA = get_post_meta(get_the_ID(), 'itunes_audio', true);
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
<?php if ($itunesA) : ?>
    <div class="cell">
        <a href="<?php echo $itunesA; ?>" class="catalog-title button hollow expanded apple-link" title="Watch <?php the_title_attribute(); ?> on <?php echo $itunesA; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("iTunes", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($googlePlayA) : ?>
    <div class="cell">
        <a href="<?php echo $googlePlayA; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $googlePlayA; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Google Play", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($youTubeA) : ?>
    <div class="cell">
        <a href="<?php echo $youTubeA; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $youTubeA; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("YouTube Music", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($amazonA) : ?>
    <div class="cell">
        <a href="<?php echo $amazonA; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $amazonA; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Amazon", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($spotifyA) : ?>
    <div class="cell">
        <a href="<?php echo $spotifyA; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $spotifyA; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Spotify", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($pandoraA) : ?>
    <div class="cell">
        <a href="<?php echo $pandoraA; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $pandoraA; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Pandora", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($walmartA) : ?>
    <div class="cell">
        <a href="<?php echo $walmartA; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $walmartA; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Walmart", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($targetA) : ?>
    <div class="cell">
        <a href="<?php echo $targetA; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $targetA; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Target", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php if ($fandangoA) : ?>
    <div class="cell">
        <a href="<?php echo $fandangoA; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $fandangoA; ?>" target="_blank" rel="noreferrer">
            <strong>
                <?php _e("Fandango", 'Nacelle'); ?>
            </strong>
            <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
            </svg>
        </a>
    </div>
<?php endif; ?>
<?php
if (have_rows('new_audio_link')) :
    while (have_rows('new_audio_link')) : the_row();
        $audioLinkTitle = get_sub_field('audio_link_title');
        $audioLinkURL = get_sub_field('audio_link_url');
        if (!empty($audioLinkTitle)) : ?>
            <div class="cell">
                <a href="<?php echo $audioLinkURL; ?>" class="catalog-title button hollow expanded" title="Watch <?php the_title_attribute(); ?> on <?php echo $audioLinkTitle; ?>" target="_blank" rel="noreferrer">
                    <strong>
                        <?php echo $audioLinkTitle; ?>
                    </strong>
                    <svg class="icon" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
<?php else : ?>
<?php endif; ?>