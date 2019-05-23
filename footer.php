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

<footer class="cell shrink footer">
    <div class="footer-container">
        <div class="footer-grid grid-x align-center-middle small-up-1 medium-up-1">

            <?php if (is_active_sidebar('l-footer-widgets')) : ?>
            	<section class="widget">
                    <?php dynamic_sidebar('l-footer-widgets'); ?>
                </section>
            <?php endif; ?>

            <?php if (is_active_sidebar('c-footer-widgets')): ?>
                <?php dynamic_sidebar('c-footer-widgets');?>
            <?php endif; ?>

            <?php if (is_active_sidebar('r-footer-widgets')): ?>
                <?php //dynamic_sidebar('r-footer-widgets');?>
                <section>

                    <?php $iconColor = get_field('icon_colors', 'option'); ?>

                  <!-- https://gist.github.com/morgyface/d8c1c4246843bf0f0c76959b68faa95f -->
                      <?php if (have_rows('social_media', 'option')): ?>
                        <div class="grid-x social">
                          <div class="cell icon-container">
                            <?php while (have_rows('social_media', 'option')) : the_row(); ?>

                            <?php $socialchannel = get_sub_field('social_channel', 'option');
                            $socialurl = get_sub_field('social_url', 'option');
                            echo '<a class="nav-link" rel="nofollow noopener noreferrer" href="' . $socialurl . '" target="_blank">';
                            ?>
                            <?php if ($socialchannel == 'facebook'): ?>

                              <svg aria-hidden="true" data-prefix="fab" data-icon="facebook" class="svg-inline--fa fa-facebook fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="<?php echo $iconColor; ?>" d="M448 56.7v398.5a24.7 24.7 0 0 1-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7A24.8 24.8 0 0 1 0 455.3V56.7A24.8 24.8 0 0 1 24.7 32h398.5A24.8 24.8 0 0 1 448 56.7z"/>
                              </svg>

                            <?php elseif ($socialchannel == 'twitter'): ?>

                              <svg aria-hidden="true" data-prefix="fab" data-icon="twitter-square" class="svg-inline--fa fa-twitter-square fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="<?php echo $iconColor; ?>" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h352a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4a131.5 131.5 0 0 0 97.2-27.2 65.7 65.7 0 0 1-61.3-45.5 70.7 70.7 0 0 0 29.6-1.2A65.6 65.6 0 0 1 77 218.2v-.8a65.5 65.5 0 0 0 29.6 8.3 65.4 65.4 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1a186.2 186.2 0 0 0 135.2 68.6 65.7 65.7 0 0 1 111.9-59.9c14.8-2.8 29-8.3 41.6-15.8a65.4 65.4 0 0 1-28.8 36.1c13.2-1.4 26-5.1 37.8-10.2a138 138 0 0 1-32.9 34z"/>
                              </svg>

                            <?php elseif ($socialchannel == 'instagram'): ?>

                              <svg aria-hidden="true" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="<?php echo $iconColor; ?>" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6a74.8 74.8 0 1 1 .1-149.3 74.8 74.8 0 0 1-.1 149.3zm146.4-194.3a26.7 26.7 0 1 1-53.6 0 26.8 26.8 0 0 1 53.6 0zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388a75.6 75.6 0 0 1-42.6 42.6c-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9A75.6 75.6 0 0 1 49.4 388c-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1A75.6 75.6 0 0 1 92 81.2c29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9a75.6 75.6 0 0 1 42.6 42.6c11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                              </svg>

                            <?php elseif ($socialchannel == 'youtube'): ?>

                              <svg aria-hidden="true" data-prefix="fab" data-icon="youtube-square" class="svg-inline--fa fa-youtube-square fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="<?php echo $iconColor; ?>" d="M186.8 202.1l95.2 54.1-95.2 54.1V202.1zM448 80v352a48 48 0 0 1-48 48H48a48 48 0 0 1-48-48V80a48 48 0 0 1 48-48h352a48 48 0 0 1 48 48zm-42 176.3s0-59.6-7.6-88.2a45.6 45.6 0 0 0-32.2-32.4C337.9 128 224 128 224 128s-113.9 0-142.2 7.7a45.6 45.6 0 0 0-32.2 32.4C42 196.6 42 256.3 42 256.3s0 59.6 7.6 88.2a45 45 0 0 0 32.2 31.9C110.1 384 224 384 224 384s113.9 0 142.2-7.7a45 45 0 0 0 32.2-31.9c7.6-28.5 7.6-88.1 7.6-88.1z"/>
                              </svg>

                            <?php elseif ($socialchannel == 'soundcloud'): ?>

                              <svg aria-hidden="true" data-prefix="fab" data-icon="soundcloud" class="svg-inline--fa fa-soundcloud fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path fill="<?php echo $iconColor; ?>" d="M111.4 256.3l5.8 65-5.8 68.3c-.3 2.5-2.2 4.4-4.4 4.4s-4.2-1.9-4.2-4.4l-5.6-68.3 5.6-65c0-2.2 1.9-4.2 4.2-4.2 2.2 0 4.1 2 4.4 4.2zm21.4-45.6c-2.8 0-4.7 2.2-5 5l-5 105.6 5 68.3c.3 2.8 2.2 5 5 5 2.5 0 4.7-2.2 4.7-5l5.8-68.3-5.8-105.6c0-2.8-2.2-5-4.7-5zm25.5-24.1c-3.1 0-5.3 2.2-5.6 5.3l-4.4 130 4.4 67.8c.3 3.1 2.5 5.3 5.6 5.3 2.8 0 5.3-2.2 5.3-5.3l5.3-67.8-5.3-130c0-3.1-2.5-5.3-5.3-5.3zM7.2 283.2c-1.4 0-2.2 1.1-2.5 2.5L0 321.3l4.7 35c.3 1.4 1.1 2.5 2.5 2.5s2.2-1.1 2.5-2.5l5.6-35-5.6-35.6c-.3-1.4-1.1-2.5-2.5-2.5zm23.6-21.9a2.5 2.5 0 0 0-2.5 2.5l-6.4 57.5 6.4 56.1c0 1.7 1.1 2.8 2.5 2.8s2.5-1.1 2.8-2.5l7.2-56.4-7.2-57.5c-.3-1.4-1.4-2.5-2.8-2.5zm25.3-11.4c-1.7 0-3.1 1.4-3.3 3.3L47 321.3l5.8 65.8c.3 1.7 1.7 3.1 3.3 3.1 1.7 0 3.1-1.4 3.1-3.1l6.9-65.8-6.9-68.1c0-1.9-1.4-3.3-3.1-3.3zm25.3-2.2a3.5 3.5 0 0 0-3.6 3.6l-5.8 70 5.8 67.8c0 2.2 1.7 3.6 3.6 3.6s3.6-1.4 3.9-3.6l6.4-67.8-6.4-70a4 4 0 0 0-3.9-3.6zm241.4-110.9a7.8 7.8 0 0 0-4.2-1.4c-2.2 0-4.2.8-5.6 1.9a10.2 10.2 0 0 0-3.3 6.7v.8l-3.3 176.7 1.7 32.5 1.7 31.7c.3 4.7 4.2 8.6 8.9 8.6s8.6-3.9 8.6-8.6l3.9-64.2-3.9-177.5c-.4-3-2-5.8-4.5-7.2zm-26.7 15.3c-1.4-.8-2.8-1.4-4.4-1.4s-3.1.6-4.4 1.4a7.9 7.9 0 0 0-3.6 6.7l-.3 1.7-2.8 160.8 3.1 65.6v.3c0 1.7.6 3.3 1.7 4.7a8.6 8.6 0 0 0 6.4 3.1c2.2 0 4.2-1.1 5.6-2.5a6.9 6.9 0 0 0 2.5-5.6l.3-6.7 3.1-58.6-3.3-162.8a9 9 0 0 0-3.9-6.7zm-111.4 22.5c-3.1 0-5.8 2.8-5.8 6.1l-4.4 140.6 4.4 67.2c.3 3.3 2.8 5.8 5.8 5.8 3.3 0 5.8-2.5 6.1-5.8l5-67.2-5-140.6c-.2-3.3-2.7-6.1-6.1-6.1zm376.7 62.8a80.3 80.3 0 0 0-30.6 6.1 139 139 0 0 0-188.6-117c-6.1 2.2-7.8 4.4-7.8 9.2v249.7c0 5 3.9 8.6 8.6 9.2h218.3a78.5 78.5 0 1 0 .1-157.2zm-296.7-60.3c-4.2 0-7.5 3.3-7.8 7.8l-3.3 136.7 3.3 65.6a7.9 7.9 0 0 0 7.8 7.5c4.2 0 7.5-3.3 7.5-7.5l3.9-65.6-3.9-136.7c-.3-4.5-3.3-7.8-7.5-7.8zm-53.6-7.8c-3.3 0-6.4 3.1-6.4 6.7l-3.9 145.3 3.9 66.9c.3 3.6 3.1 6.4 6.4 6.4 3.6 0 6.4-2.8 6.7-6.4l4.4-66.9-4.4-145.3c-.3-3.6-3.1-6.7-6.7-6.7zm26.7 3.4a6.9 6.9 0 0 0-6.9 6.9L227 321.3l3.9 66.4c.3 3.9 3.1 6.9 6.9 6.9s6.9-3.1 6.9-6.9l4.2-66.4-4.2-141.7c0-3.9-3-6.9-6.9-6.9z"/>
                              </svg>

                            <?php elseif ($socialchannel == 'spotify'): ?>

                              <svg aria-hidden="true" data-prefix="fab" data-icon="spotify" class="svg-inline--fa fa-spotify fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                <path fill="<?php echo $iconColor; ?>" d="M248 8a248 248 0 1 0 .2 496.2A248 248 0 0 0 248 8zm100.7 364.9c-4.2 0-6.8-1.3-10.7-3.6-62.4-37.6-135-39.2-206.7-24.5-3.9 1-9 2.6-11.9 2.6-9.7 0-15.8-7.7-15.8-15.8 0-10.3 6.1-15.2 13.6-16.8 81.9-18.1 165.6-16.5 237 26.2 6.1 3.9 9.7 7.4 9.7 16.5s-7.1 15.4-15.2 15.4zm26.9-65.6c-5.2 0-8.7-2.3-12.3-4.2-62.5-37-155.7-51.9-238.6-29.4-4.8 1.3-7.4 2.6-11.9 2.6-10.7 0-19.4-8.7-19.4-19.4s5.2-17.8 15.5-20.7a336.4 336.4 0 0 1 97.8-13.6c64.9 0 127.6 16.1 177 45.5 8.1 4.8 11.3 11 11.3 19.7a19.4 19.4 0 0 1-19.4 19.5zm31-76.2a23 23 0 0 1-12.9-3.9c-71.2-42.5-198.5-52.7-280.9-29.7-3.6 1-8.1 2.6-12.9 2.6a23 23 0 0 1-23.3-23.6c0-13.6 8.4-21.3 17.4-23.9a419.1 419.1 0 0 1 117.5-15.2c73 0 149.5 15.2 205.4 47.8a23.5 23.5 0 0 1 12.9 22.6c0 13.6-11 23.3-23.2 23.3z"/>
                              </svg>

                            <?php else: ?>

                            <?php endif; ?>

                            <?php
                            // echo '<i class="fab fa-' . $socialchannel . '" aria-hidden="true"></i>';
                            // echo '<span class="sr-only hidden">' . ucfirst($socialchannel) . '</span>';
                            echo "</a>";
                            ?>
                            <?php endwhile; ?>
                          </div>
                        </div>

                      <?php endif; ?>

                </section>

            <?php endif; ?>




        </div>
    </div>


<!-- modal content -->
    <div class="reveal" id="newsletterModal1" data-reveal>

                <!-- Begin Mailchimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
        	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
        	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div id="mc_embed_signup">
        <form action="https://facebook.us11.list-manage.com/subscribe/post?u=c42b29416d69f04ad505ddce6&amp;id=65b3e80609" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
        	<h2>Subscribe to our mailing list</h2>
        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
        <div class="mc-field-group">
        	<label for="mce-EMAIL">Email Address*  <span class="asterisk">*</span>
        </label>
        	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>
        <div class="mc-field-group">
        	<label for="mce-FNAME">First Name </label>
        	<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
        </div>
        <div class="mc-field-group">
        	<label for="mce-LNAME">Last Name </label>
        	<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
        </div>
        <div class="mc-field-group">
        	<label for="mce-MMERGE4">City* </label>
        	<input type="text" value="" name="MMERGE4" class="" id="mce-MMERGE4">
        </div>
        <div class="mc-field-group">
        	<label for="mce-MMERGE5">State/Province (us/canada)* </label>
        	<input type="text" value="" name="MMERGE5" class="" id="mce-MMERGE5">
        </div>
        	<div id="mce-responses" class="clear">
        		<div class="response" id="mce-error-response" style="display:none"></div>
        		<div class="response" id="mce-success-response" style="display:none"></div>
        	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_c42b29416d69f04ad505ddce6_65b3e80609" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='text';fnames[3]='TEXTYUI_3';ftypes[3]='text';fnames[6]='TEXTAREAY';ftypes[6]='text';fnames[7]='CHECKBOXY';ftypes[7]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
        <!--End mc_embed_signup-->

      <button class="close-button" data-close aria-label="Close reveal" type="button">

        <span aria-hidden="true">&times;</span>

      </button>
    </div>
<!-- modal conent -->


</footer>
<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer();?>

</body>
</html>
