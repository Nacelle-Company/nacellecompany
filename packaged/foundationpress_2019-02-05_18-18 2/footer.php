<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package Comedy_Dynamics
 * @since Comedy_Dynamics 1.0.0
 */
?>
<footer class="cell shrink footer">
    <div class="footer-container">
        <div class="footer-grid grid-x align-center-middle small-up-1 medium-up-1">

            <?php if (is_active_sidebar('l-footer-widgets')) : ?>
            	<section class="widget">
                    <a data-open="newsletterModal1">
                        <?php dynamic_sidebar('l-footer-widgets'); ?>
                	</a>
                </section>
            <?php endif; ?>

            <?php if (is_active_sidebar('c-footer-widgets')): ?>
                <?php dynamic_sidebar('c-footer-widgets');?>
            <?php endif; ?>

            <?php if (is_active_sidebar('r-footer-widgets')): ?>
                <?php dynamic_sidebar('r-footer-widgets');?>
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
