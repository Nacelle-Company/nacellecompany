<?php
$talents = get_field('talent');
$talent = get_field('talent');
$directors = get_field('directors');
$producers = get_field('producers');
$writers = get_field('writers');
$siteURL = get_site_url();
?>
<div class="catalog-crew grid-container grid-x grid-padding-x grid-padding-y">

    <div class="cell medium-4 title">

        <div class="grid-x">

            <p><?php _e('Credits', 'nacelle'); ?></p>

        </div>

    </div>
    <?php
    // $taxonomy = 'event-categories';
    // $terms = get_terms($taxonomy);
    // if ($terms) {
    //     foreach ($terms as $term) {
    //         echo '<li><a href="http:/mysite.com/events/categories/project-events/' . $term->slug . '">' . $term->name . '</a></li>';
    //     }
    // };
    ?>
    <!-- START the crew -->
    <div class="cell medium-8">

        <!-- TALENT -->
        <?php if ($talents) : ?>

            <div class="grid-x">

                <!-- talent title -->
                <div class="cell small-4 title">

                    <p><?php _e('Talent', 'nacelle'); ?></p>

                </div>

                <!-- talent list -->
                <div class="cell small-8">

                    <p>
                        <?php

                        $talentstr = array();
                        foreach ($talents as $talent) {
                            $talentstr[] = $talent->name;
                            $talentSlug[] = '<a class="alt" href="' . $siteURL . '/main-talent/' . $talent->slug . '">' . $talent->name . '</a>';
                        }
                        echo implode(", ", $talentSlug);

                        ?>
                    </p>

                </div>

            </div>

        <?php endif; ?>

        <!-- end TALENT -->
        <!-- DIRECTORS -->

        <?php if ($directors) : ?>

            <div class="grid-x">

                <!-- directors title -->
                <div class="cell small-4 title">

                    <p><?php _e('Director(s)', 'nacelle'); ?></p>

                </div>

                <div class="cell small-8">

                    <p>
                        <?php

                        $directorsstr = array();

                        foreach ($directors as $director) {
                            $directorsstr[] = $director->name;
                            $directorSlug[] = '<a class="alt" href="' . $siteURL . '/directors/' . $director->slug . '">' . $director->name . '</a>';
                        }
                        echo implode(", ", $directorSlug);

                        ?>
                    </p>

                </div>

            </div>

        <?php endif; ?>
        <!-- end DIRECTORS -->

        <!-- PRODUCERS -->
        <?php if ($producers) : ?>

            <div class="grid-x">

                <div class="cell small-4 title">

                    <p><?php _e('Producer(s)', 'nacelle'); ?></p>

                </div>

                <div class="cell small-8">

                    <p>
                        <?php

                        $producerstr = array();

                        foreach ($producers as $producer) {
                            $producerstr[] = $producer->name;
                            $producerSlug[] = '<a class="alt" href="' . $siteURL . '/producers/' . $producer->slug . '">' . $producer->name . '</a>';
                        }
                        echo implode(", ", $producerSlug);

                        ?>

                    </p>

                </div>

            </div>
        <?php endif; ?>
        <!-- end PRODUCERS -->

        <?php if ($writers) : ?>

            <div class="grid-x">

                <div class="cell small-4 title">

                    <p><?php _e('Writer(s):', 'nacelle'); ?></p>

                </div>

                <div class="cell small-8">

                    <p>
                        <?php $writerstr = array();
                        foreach ($writers as $writer) {
                            $writerstr[] = $writer->name;
                            $writerSlug[] = '<a class="alt" href="' . $siteURL . '/writers/' . $writer->slug . '">' . $writer->name . '</a>';
                        }
                        echo implode(", ", $writerSlug);
                        ?>
                    </p>

                </div>

            </div>

        <?php endif; ?>


    </div> <!-- end CREW -->

</div>