<!-- orbit carousel code -->
<div class="orbit animation-element" data-timer-delay="2000" role="region" aria-label="Comedy Dynamics featured works" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">

  <ul class="orbit-container" height="auto">

    <?php $post_objects = get_field('home_feat_posts');
    if ($post_objects) : ?>

      <?php foreach ($post_objects as $post_object) : ?>

        <li class="orbit-slide">

          <a href="<?php echo get_permalink($post_object->ID); ?>">

            <?php

            $img_size_lg = 'fp-large';
            $img_size_md = 'fp-medium';
            $img_size_sm = 'fp-small';

            $image = get_field('square_image', $post_object->ID);

            $hero_image_alt = $image['alt']; /* Get image object alt */

            /* Get custom sizes of our image sub_field */
            $hero_lg = $image['sizes'][$img_size_lg];
            $hero_md = $image['sizes'][$img_size_md];
            $hero_sm = $image['sizes'][$img_size_sm];

            ?>
            <!-- data-interchange background image -->
            <div class="featured-hero" role="banner" data-interchange="[<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]">
              <div class="grid-x">
                <div class="cell">
                  <h2 class="text-right"><?php echo get_the_title($post_object->ID); ?></h2>
                </div>
              </div>
              </header>



          </a>

        </li>

      <?php endforeach; ?>
      <!-- $post_objects as $post_object -->

    <?php endif; ?>
    <!-- $post_objects -->

    <!-- for mobile -->
    <?php if (wp_is_mobile()) : ?>

      <?php $post_objects = get_field('home_circle_post');
      if ($post_objects) : ?>

        <?php foreach ($post_objects as $post_object) : ?>

          <li class="orbit-slide">

            <a href="<?php echo get_permalink($post_object->ID); ?>">

              <?php

              $img_size_lg = 'fp-large';
              $img_size_md = 'fp-medium';
              $img_size_sm = 'fp-small';

              $image = get_field('square_image', $post_object->ID);

              $hero_image_alt = $image['alt']; /* Get image object alt */

              /* Get custom sizes of our image sub_field */
              $hero_lg = $image['sizes'][$img_size_lg];
              $hero_md = $image['sizes'][$img_size_md];
              $hero_sm = $image['sizes'][$img_size_sm];

              ?>

              <!-- Hook up Interchange as an img src -->
              <img class="my-hero superman" data-interchange="[<?php echo $hero_md; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_md; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
              <noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

            </a>

          </li>

        <?php endforeach; ?>
        <!-- END $post_objects as $post_object -->

      <?php endif; ?>
      <!-- END $post_objects -->

    <?php endif; ?>
    <!-- END wp_is_mobile if  -->
  </ul>

</div>