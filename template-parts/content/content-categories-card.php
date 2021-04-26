<?php
$image = get_field('square_image');
if (!is_array($image)) {
  $image = acf_get_attachment($image);
}
$alt = $image['alt'];
if ($image) :
?>
  <div class="cell medium-2">

    <a href="<?php the_permalink(); ?>" aria-label="Visit">

      <div class="callout" data-callout-hover-reveal>

        <div class="callout-body">

          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        </div>

        <div class="callout-footer">
          <div class="callout-content">
            <p><?php
                $trim_length = 20;  //desired length of text to display
                $value_more = ' . . .'; // what to add at the end of the trimmed text
                $custom_field = 'synopsis';
                $value = get_post_meta($post->ID, $custom_field, true);
                if ($value) {
                  echo wp_trim_words($value, $trim_length, $value_more);
                }
                ?></p>
          </div>

        </div>

      </div>

    </a>

  </div>
<?php endif; ?>