<?php
$talents = get_field('talent');
$directors = get_field('directors');
$producers = get_field('producers');
$writers = get_field('writers');
$siteURL = get_site_url();
if (!empty($talents) || !empty($directors) || !empty($producers) || !empty($writers)) :
?>
    <div class="catalog-crew grid-x medium-order-2 large-order-3 medium-up-1 large-up-2 px-medium-3 px-large-4 pt-2">
        <div class="cell medium-4 title">
            <div class="grid-y medium-grid-frame">
                <h2 class="h5"><?php the_title(); ?></h2>
                <h2 class="h4"><?php _e('Credits', 'nacelle'); ?></h2>
            </div>
        </div>
        <div class="cell medium-8 crew">
            <?php if ($talents) : ?>
                <div class="grid-x">
                    <div class="cell small-4 subtitle">
                        <p><?php _e('Talent', 'nacelle'); ?></p>
                    </div>
                    <div class="cell small-8">
                        <ul class="no-bullet">
                            <?php
                            $talentstr = array();
                            foreach ($talents as $talent) {
                                $talentstr[] = $talent->name;
                                $talentSlug[] = '<a class="alt" href="' . $siteURL . '/main-talent/' . $talent->slug . '/" title="' . $talent->name . '">' . $talent->name . '</a>';
                            }
                            echo implode(',&nbsp;', $talentSlug);
                            ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($directors) : ?>
                <div class="grid-x">
                    <div class="cell small-4 subtitle">
                        <p><?php _e('Director(s)', 'nacelle'); ?></p>
                    </div>
                    <div class="cell small-8">
                        <p>
                            <?php
                            $directorsstr = array();
                            foreach ($directors as $director) {
                                $directorsstr[] = $director->name;
                                $directorSlug[] = '<a class="alt" href="' . $siteURL . '/directors/' . $director->slug . '/" title="' . $director->name . '">' . $director->name . '</a>';
                            }
                            echo implode(", ", $directorSlug);
                            ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($producers) : ?>
                <div class="grid-x">
                    <div class="cell small-4 subtitle">
                        <p><?php _e('Producer(s)', 'nacelle'); ?></p>
                    </div>
                    <div class="cell small-8">
                        <p>
                            <?php
                            $producerstr = array();
                            foreach ($producers as $producer) {
                                $producerstr[] = $producer->name;
                                $producerSlug[] = '<a class="alt" href="' . $siteURL . '/producers/' . $producer->slug . '/" title="' . $producer->name . '">' . $producer->name . '</a>';
                            }
                            echo implode(", ", $producerSlug);
                            ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($writers) : ?>
                <div class="grid-x">
                    <div class="cell small-4 subtitle">
                        <p><?php _e('Writer(s):', 'nacelle'); ?></p>
                    </div>
                    <div class="cell small-8">
                        <p>
                            <?php $writerstr = array();
                            foreach ($writers as $writer) {
                                $writerstr[] = $writer->name;
                                $writerSlug[] = '<a class="alt" href="' . $siteURL . '/writers/' . $writer->slug . '" title="' . $writer->name . '">' . $writer->name . '</a>';
                            }
                            echo implode(", ", $writerSlug);
                            ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php
        $imdbV = get_post_meta(get_the_ID(), 'imdb_video', true);
        if ($imdbV) : ?>
            <div class="cell">
                <a href="<?php echo $imdbV; ?>" class="catalog-title button expanded" rel="noreferrer" title="Watch <?php the_title_attribute(); ?> on <?php echo $imdbV; ?>" target="_blank" rel="noreferrer">
                    <strong><?php _e("View on IMDB", 'Nacelle'); ?></strong>
                    <svg class="icon alt" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.938 8.75h-.626a.313.313 0 00-.312.313v2.187H3.75V5h2.813c.172 0 .312-.14.312-.313v-.625a.313.313 0 00-.313-.312H3.438a.938.938 0 00-.937.938v6.875c0 .517.42.937.938.937h6.874c.518 0 .938-.42.938-.938v-2.5a.313.313 0 00-.313-.312zM12.03 2.5h-2.5a.47.47 0 00-.332.8L9.897 4l-4.76 4.758a.469.469 0 000 .664l.442.442a.469.469 0 00.665 0l4.758-4.76.697.698a.47.47 0 00.801-.332v-2.5a.469.469 0 00-.469-.469z" fill-rule="nonzero" />
                    </svg>
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>