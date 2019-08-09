<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */
?>
<!-- back to top -->
<!-- https://codepen.io/adventuresinmissions/pen/suzKB -->
<a href="#0" class="cd-top">Top</a>

<footer class="shrink footer">
  <div class="footer-container">
    <div class="footer-grid grid-x align-middle">

      <?php if (is_active_sidebar('l-footer-widgets')) : ?>
        <?php // dynamic_sidebar('l-footer-widgets'); 
        ?>

        <div class="cell medium-4 l-footer-widgets">
          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="footer-logo">
            <svg class="footer-logo" width="149px" height="54px" viewBox="0 0 149 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <polygon id="path-1" points="0 0 9 0 9 23 0 23"></polygon>
                <polygon id="path-3" points="0 0 8 0 8 23 0 23"></polygon>
                <polygon id="path-5" points="0 0 9 0 9 23 0 23"></polygon>
                <polygon id="path-7" points="0 0 8 0 8 23 0 23"></polygon>
                <polygon id="path-9" points="0 0 3 0 3 3 0 3"></polygon>
              </defs>
              <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Artboard-Copy-3">
                  <polygon id="Fill-1" class="color" points="61.7621777 15 61.7621777 26.2428018 56.9604117 15 55 15 55 38 58.2378223 38 58.2378223 27.1412925 62.9818432 38 65 38 65 15"></polygon>
                  <g id="Group-5" transform="translate(84.000000, 15.000000)">

                    <g id="Clip-4"></g>
                    <path class="color" d="M7.12252188,0 L1.87747812,0 C0.842293267,0 0,0.950953455 0,2.11960727 L0,20.8803927 C0,22.0886153 0.842159314,23 1.95892124,23 L7.12252188,23 C8.19280229,23 9,22.0886153 9,20.8803927 L9,14.6437556 L5.84273977,14.6437556 L5.84273977,20.0250999 L3.15699232,20.0250999 L3.15699232,2.97475518 L5.84273977,2.97475518 L5.84273977,7.12106298 L9,7.12106298 L9,2.11960727 C9,0.931241571 8.17525451,0 7.12252188,0" id="Fill-3" class="color" mask="url(#mask-2)"></path>
                  </g>
                  <g id="Group-8" transform="translate(97.000000, 15.000000)">
                    <mask id="mask-4" fill="white">
                      <use xlink:href="#path-3"></use>
                    </mask>
                    <g id="Clip-7"></g>
                    <polygon id="Fill-6" class="color" mask="url(#mask-4)" points="3.47839563 12.7373555 7.64060367 12.7373555 7.64060367 9.73303253 3.47839563 9.73303253 3.47839563 2.97490012 7.90996642 2.97490012 7.90996642 0 0 0 0 23 8 23 8 20.0250999 3.47839563 20.0250999"></polygon>
                  </g>
                  <g id="Group-11" transform="translate(109.000000, 15.000000)">
                    <mask id="mask-6" fill="white">
                      <use xlink:href="#path-5"></use>
                    </mask>
                    <g id="Clip-10"></g>
                    <polygon id="Fill-9" class="color" mask="url(#mask-6)" points="3.65366795 0 0 0 0 23 9 23 9 20.0250999 3.65366795 20.0250999"></polygon>
                  </g>
                  <g id="Group-14" transform="translate(121.000000, 15.000000)">
                    <mask id="mask-8" fill="white">
                      <use xlink:href="#path-7"></use>
                    </mask>
                    <g id="Clip-13"></g>
                    <polygon id="Fill-12" class="color" mask="url(#mask-8)" points="3.24734739 0 0 0 0 23 8 23 8 20.0250999 3.24734739 20.0250999"></polygon>
                  </g>
                  <polygon id="Fill-15" class="color" points="135.478248 35.0252261 135.478248 27.7374358 139.640604 27.7374358 139.640604 24.7330939 135.478248 24.7330939 135.478248 17.9747739 139.909966 17.9747739 139.909966 15 132 15 132 38 140 38 140 35.0252261"></polygon>
                  <g id="Group-25" transform="translate(141.000000, 15.000000)">
                    <mask id="mask-10" fill="white">
                      <use xlink:href="#path-9"></use>
                    </mask>
                    <g id="Clip-24"></g>
                    <path d="M1.20287095,2.3578125 L0.953713198,2.3578125 L0.953713198,0.594287109 L1.88823788,0.594287109 C2.06547532,0.594287109 2.14208291,0.704443359 2.14208291,0.838623047 L2.14208291,1.42807617 C2.14208291,1.59594727 2.00790977,1.67724609 1.88823788,1.67724609 L1.75875201,1.67724609 L2.20916947,2.3578125 L1.92163469,2.3578125 L1.33235682,1.48564453 L1.36575363,1.44726562 L1.88340413,1.44726562 L1.88340413,0.824267578 L1.20287095,0.824267578 L1.20287095,2.3578125 Z M0.244470485,1.50014648 C0.244470485,2.33378906 0.738098726,2.77954102 1.50490699,2.77954102 C2.28094331,2.77954102 2.76505053,2.28603516 2.76505053,1.50014648 C2.76505053,0.733300781 2.29075729,0.220458984 1.50490699,0.220458984 C0.709242713,0.220458984 0.244470485,0.723632812 0.244470485,1.50014648 L0.244470485,1.50014648 Z M1.49992676,0 C2.41042918,0 3,0.608642578 3,1.50014648 C3,2.41040039 2.41042918,3 1.49992676,3 C0.589570822,3 0,2.42958984 0,1.50014648 C0,0.579931641 0.608612861,0 1.49992676,0 L1.49992676,0 Z" id="Fill-23" class="color" mask="url(#mask-10)"></path>
                  </g>
                  <g id="Group-3" transform="translate(4.000000, 4.000000)" class="color">
                    <path d="M37,22.5000396 C37,14.5046307 30.4953693,8 22.5000396,8 C14.5047099,8 8,14.5046307 8,22.5000396 C8,30.4954485 14.5047099,37 22.5000396,37 C30.4953693,37 37,30.4954485 37,22.5000396" id="Fill-17"></path>
                    <path d="M24,0 L24,5.6452841 C32.6150383,6.34758971 39.4123337,13.6383418 39.4123337,22.5 C39.4123337,31.3616582 32.6150383,38.6523329 24,39.3547932 L24,45 C35.6987328,44.2866338 45,34.4684323 45,22.5 C45,10.531645 35.6987328,0.713443498 24,0" id="Fill-19"></path>
                    <path d="M21,45 L21,39.3547932 C12.3849302,38.6524103 5.58761003,31.3616582 5.58761003,22.5000773 C5.58761003,13.6383418 12.3849302,6.34766706 21,5.6452841 L21,0 C9.30130119,0.713443498 0,10.531645 0,22.5000773 C0,34.4684323 9.30130119,44.2866338 21,45" id="Fill-21"></path>
                  </g>
                  <g id="A" transform="translate(68.000000, 15.000000)" class="color">
                    <path d="M4.14258239,7.10542736e-15 L-2.16715534e-13,22.6174159 L3.29558077,22.6174159 L3.97964344,18.3379445 L7.47047002,18.3379445 L8.12573744,22.6174159 L11.5360778,22.6174159 L7.45164776,7.10542736e-15 L4.14258239,7.10542736e-15 Z M5.76396542,8.06022929 L6.98656942,15.3545009 L4.4680389,15.3545009 L5.76396542,8.06022929 Z" id="Fill-2"></path>
                  </g>
                </g>
              </g>
            </svg>
          </a>
        </div>

      <?php endif; ?>

      <div class="cell medium-4 c-footer-widgets">
        <?php if (is_active_sidebar('c-footer-widgets')) : ?>
          <?php dynamic_sidebar('c-footer-widgets'); ?>
        <?php endif; ?>
      </div>

      <?php if (is_active_sidebar('r-footer-widgets')) : ?>

        <?php $iconColor = get_field('icon_colors', 'option'); ?>

        <!-- https://gist.github.com/morgyface/d8c1c4246843bf0f0c76959b68faa95f -->
        <?php if (have_rows('social_media', 'option')) : ?>
          <div class="cell medium-4 r-footer-widgets">
            <div class="grid-x align-middle">
              <div class="cell medium-shrink">
                <a class="contactModal" data-open="contactModal">
                  <p><?php _e('Contact', 'nacelle'); ?></p>
                </a>
              </div>
              <div class="social cell medium-shrink">
                <div class="grid-x align-right icon-container">
                  <?php while (have_rows('social_media', 'option')) : the_row(); ?>

                    <?php $socialchannel = get_sub_field('social_channel', 'option');
                    $socialurl = get_sub_field('social_url', 'option');
                    echo '<a class="cell medium-shrink nav-link" rel="nofollow noopener noreferrer" href="' . $socialurl . '" target="_blank">';
                    ?>
                    <?php if ($socialchannel == 'facebook') : ?>

                      <svg aria-hidden="true" data-prefix="fab" data-icon="facebook" class="svg-inline--fa fa-facebook fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="<?php echo $iconColor; ?>" d="M448 56.7v398.5a24.7 24.7 0 0 1-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7A24.8 24.8 0 0 1 0 455.3V56.7A24.8 24.8 0 0 1 24.7 32h398.5A24.8 24.8 0 0 1 448 56.7z" />
                      </svg>

                    <?php elseif ($socialchannel == 'twitter') : ?>

                      <svg aria-hidden="true" data-prefix="fab" data-icon="twitter-square" class="svg-inline--fa fa-twitter-square fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="<?php echo $iconColor; ?>" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h352a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4a131.5 131.5 0 0 0 97.2-27.2 65.7 65.7 0 0 1-61.3-45.5 70.7 70.7 0 0 0 29.6-1.2A65.6 65.6 0 0 1 77 218.2v-.8a65.5 65.5 0 0 0 29.6 8.3 65.4 65.4 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1a186.2 186.2 0 0 0 135.2 68.6 65.7 65.7 0 0 1 111.9-59.9c14.8-2.8 29-8.3 41.6-15.8a65.4 65.4 0 0 1-28.8 36.1c13.2-1.4 26-5.1 37.8-10.2a138 138 0 0 1-32.9 34z" />
                      </svg>

                    <?php elseif ($socialchannel == 'instagram') : ?>

                      <svg aria-hidden="true" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="<?php echo $iconColor; ?>" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6a74.8 74.8 0 1 1 .1-149.3 74.8 74.8 0 0 1-.1 149.3zm146.4-194.3a26.7 26.7 0 1 1-53.6 0 26.8 26.8 0 0 1 53.6 0zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388a75.6 75.6 0 0 1-42.6 42.6c-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9A75.6 75.6 0 0 1 49.4 388c-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1A75.6 75.6 0 0 1 92 81.2c29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9a75.6 75.6 0 0 1 42.6 42.6c11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                      </svg>

                    <?php elseif ($socialchannel == 'youtube') : ?>

                      <svg aria-hidden="true" data-prefix="fab" data-icon="youtube-square" class="svg-inline--fa fa-youtube-square fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="<?php echo $iconColor; ?>" d="M186.8 202.1l95.2 54.1-95.2 54.1V202.1zM448 80v352a48 48 0 0 1-48 48H48a48 48 0 0 1-48-48V80a48 48 0 0 1 48-48h352a48 48 0 0 1 48 48zm-42 176.3s0-59.6-7.6-88.2a45.6 45.6 0 0 0-32.2-32.4C337.9 128 224 128 224 128s-113.9 0-142.2 7.7a45.6 45.6 0 0 0-32.2 32.4C42 196.6 42 256.3 42 256.3s0 59.6 7.6 88.2a45 45 0 0 0 32.2 31.9C110.1 384 224 384 224 384s113.9 0 142.2-7.7a45 45 0 0 0 32.2-31.9c7.6-28.5 7.6-88.1 7.6-88.1z" />
                      </svg>

                    <?php elseif ($socialchannel == 'soundcloud') : ?>

                      <svg aria-hidden="true" data-prefix="fab" data-icon="soundcloud" class="svg-inline--fa fa-soundcloud fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill="<?php echo $iconColor; ?>" d="M111.4 256.3l5.8 65-5.8 68.3c-.3 2.5-2.2 4.4-4.4 4.4s-4.2-1.9-4.2-4.4l-5.6-68.3 5.6-65c0-2.2 1.9-4.2 4.2-4.2 2.2 0 4.1 2 4.4 4.2zm21.4-45.6c-2.8 0-4.7 2.2-5 5l-5 105.6 5 68.3c.3 2.8 2.2 5 5 5 2.5 0 4.7-2.2 4.7-5l5.8-68.3-5.8-105.6c0-2.8-2.2-5-4.7-5zm25.5-24.1c-3.1 0-5.3 2.2-5.6 5.3l-4.4 130 4.4 67.8c.3 3.1 2.5 5.3 5.6 5.3 2.8 0 5.3-2.2 5.3-5.3l5.3-67.8-5.3-130c0-3.1-2.5-5.3-5.3-5.3zM7.2 283.2c-1.4 0-2.2 1.1-2.5 2.5L0 321.3l4.7 35c.3 1.4 1.1 2.5 2.5 2.5s2.2-1.1 2.5-2.5l5.6-35-5.6-35.6c-.3-1.4-1.1-2.5-2.5-2.5zm23.6-21.9a2.5 2.5 0 0 0-2.5 2.5l-6.4 57.5 6.4 56.1c0 1.7 1.1 2.8 2.5 2.8s2.5-1.1 2.8-2.5l7.2-56.4-7.2-57.5c-.3-1.4-1.4-2.5-2.8-2.5zm25.3-11.4c-1.7 0-3.1 1.4-3.3 3.3L47 321.3l5.8 65.8c.3 1.7 1.7 3.1 3.3 3.1 1.7 0 3.1-1.4 3.1-3.1l6.9-65.8-6.9-68.1c0-1.9-1.4-3.3-3.1-3.3zm25.3-2.2a3.5 3.5 0 0 0-3.6 3.6l-5.8 70 5.8 67.8c0 2.2 1.7 3.6 3.6 3.6s3.6-1.4 3.9-3.6l6.4-67.8-6.4-70a4 4 0 0 0-3.9-3.6zm241.4-110.9a7.8 7.8 0 0 0-4.2-1.4c-2.2 0-4.2.8-5.6 1.9a10.2 10.2 0 0 0-3.3 6.7v.8l-3.3 176.7 1.7 32.5 1.7 31.7c.3 4.7 4.2 8.6 8.9 8.6s8.6-3.9 8.6-8.6l3.9-64.2-3.9-177.5c-.4-3-2-5.8-4.5-7.2zm-26.7 15.3c-1.4-.8-2.8-1.4-4.4-1.4s-3.1.6-4.4 1.4a7.9 7.9 0 0 0-3.6 6.7l-.3 1.7-2.8 160.8 3.1 65.6v.3c0 1.7.6 3.3 1.7 4.7a8.6 8.6 0 0 0 6.4 3.1c2.2 0 4.2-1.1 5.6-2.5a6.9 6.9 0 0 0 2.5-5.6l.3-6.7 3.1-58.6-3.3-162.8a9 9 0 0 0-3.9-6.7zm-111.4 22.5c-3.1 0-5.8 2.8-5.8 6.1l-4.4 140.6 4.4 67.2c.3 3.3 2.8 5.8 5.8 5.8 3.3 0 5.8-2.5 6.1-5.8l5-67.2-5-140.6c-.2-3.3-2.7-6.1-6.1-6.1zm376.7 62.8a80.3 80.3 0 0 0-30.6 6.1 139 139 0 0 0-188.6-117c-6.1 2.2-7.8 4.4-7.8 9.2v249.7c0 5 3.9 8.6 8.6 9.2h218.3a78.5 78.5 0 1 0 .1-157.2zm-296.7-60.3c-4.2 0-7.5 3.3-7.8 7.8l-3.3 136.7 3.3 65.6a7.9 7.9 0 0 0 7.8 7.5c4.2 0 7.5-3.3 7.5-7.5l3.9-65.6-3.9-136.7c-.3-4.5-3.3-7.8-7.5-7.8zm-53.6-7.8c-3.3 0-6.4 3.1-6.4 6.7l-3.9 145.3 3.9 66.9c.3 3.6 3.1 6.4 6.4 6.4 3.6 0 6.4-2.8 6.7-6.4l4.4-66.9-4.4-145.3c-.3-3.6-3.1-6.7-6.7-6.7zm26.7 3.4a6.9 6.9 0 0 0-6.9 6.9L227 321.3l3.9 66.4c.3 3.9 3.1 6.9 6.9 6.9s6.9-3.1 6.9-6.9l4.2-66.4-4.2-141.7c0-3.9-3-6.9-6.9-6.9z" />
                      </svg>

                    <?php elseif ($socialchannel == 'spotify') : ?>

                      <svg aria-hidden="true" data-prefix="fab" data-icon="spotify" class="svg-inline--fa fa-spotify fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                        <path fill="<?php echo $iconColor; ?>" d="M248 8a248 248 0 1 0 .2 496.2A248 248 0 0 0 248 8zm100.7 364.9c-4.2 0-6.8-1.3-10.7-3.6-62.4-37.6-135-39.2-206.7-24.5-3.9 1-9 2.6-11.9 2.6-9.7 0-15.8-7.7-15.8-15.8 0-10.3 6.1-15.2 13.6-16.8 81.9-18.1 165.6-16.5 237 26.2 6.1 3.9 9.7 7.4 9.7 16.5s-7.1 15.4-15.2 15.4zm26.9-65.6c-5.2 0-8.7-2.3-12.3-4.2-62.5-37-155.7-51.9-238.6-29.4-4.8 1.3-7.4 2.6-11.9 2.6-10.7 0-19.4-8.7-19.4-19.4s5.2-17.8 15.5-20.7a336.4 336.4 0 0 1 97.8-13.6c64.9 0 127.6 16.1 177 45.5 8.1 4.8 11.3 11 11.3 19.7a19.4 19.4 0 0 1-19.4 19.5zm31-76.2a23 23 0 0 1-12.9-3.9c-71.2-42.5-198.5-52.7-280.9-29.7-3.6 1-8.1 2.6-12.9 2.6a23 23 0 0 1-23.3-23.6c0-13.6 8.4-21.3 17.4-23.9a419.1 419.1 0 0 1 117.5-15.2c73 0 149.5 15.2 205.4 47.8a23.5 23.5 0 0 1 12.9 22.6c0 13.6-11 23.3-23.2 23.3z" />
                      </svg>

                    <?php else : ?>

                    <?php endif; ?>

                    <?php
                    // echo '<i class="fab fa-' . $socialchannel . '" aria-hidden="true"></i>';
                    // echo '<span class="sr-only hidden">' . ucfirst($socialchannel) . '</span>';
                    echo "</a>";
                    ?>
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
          </div>

        <?php endif; ?>

      <?php endif; ?>




    </div>
  </div>


  <!-- Contact modal -->
  <div class="reveal" id="contactModal" data-reveal>
    <?php dynamic_sidebar('r-footer-widgets'); ?>
    <button class="close-button" data-close aria-label="Close reveal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <script>
    function onPlayerReady(event) {
      $('.bounce').click(function() {
        ytPlayer.playVideo();
      });
    }
  </script>
  <!-- products modal -->
  <div class="reveal productsModal" id="productsModal" data-reveal>
    <div class="embed-container">
      <?php the_field('featured_video'); ?>
    </div>
    <button class="close-button" data-close aria-label="Close reveal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

</footer>
<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
  </div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>


</body>

</html>