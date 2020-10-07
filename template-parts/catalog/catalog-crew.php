<?php
$talents = get_field('talent');
$talent = get_field('talent');
$directors = get_field('directors');
$producers = get_field('producers');
$writers = get_field('writers');
?>
<div class="catalog-crew grid-container grid-x grid-padding-x grid-padding-y">

    <div class="cell medium-4 title">

        <div class="grid-x">

            <p><?php _e('Credits', 'nacelle'); ?></p>

        </div>

    </div>

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
                        }

                        echo implode(", ", $talentstr);

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
                        }
                        echo implode(", ", $directorsstr);

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
                        }
                        echo implode(", ", $producerstr);

                        ?>

                    </p>

                </div>

            </div>
        <?php endif; ?>
        <!-- end PRODUCERS -->

    </div> <!-- end CREW -->

</div>