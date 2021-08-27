<?php

/**
 * Entry meta information for posts
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

function social_share_menu_item()
{
  add_submenu_page("options-general.php", "Social Share", "Social Share", "manage_options", "social-share", "social_share_page");
}

add_action("admin_menu", "social_share_menu_item");


function social_share_page()
{
?>
  <div class="wrap">
    <h1>Social Sharing Options</h1>

    <form method="post" action="options.php">
      <?php
      settings_fields("social_share_config_section");

      do_settings_sections("social-share");

      submit_button();
      ?>
    </form>
  </div>
<?php
}

// display the section and its option fields
function social_share_settings()
{
  add_settings_section("social_share_config_section", "", null, "social-share");

  add_settings_field("social-share-facebook", "Do you want to display Facebook share button?", "social_share_facebook_checkbox", "social-share", "social_share_config_section");
  add_settings_field("social-share-twitter", "Do you want to display Twitter share button?", "social_share_twitter_checkbox", "social-share", "social_share_config_section");
  add_settings_field("social-share-linkedin", "Do you want to display LinkedIn share button?", "social_share_linkedin_checkbox", "social-share", "social_share_config_section");
  add_settings_field("social-share-reddit", "Do you want to display Reddit share button?", "social_share_reddit_checkbox", "social-share", "social_share_config_section");

  register_setting("social_share_config_section", "social-share-facebook");
  register_setting("social_share_config_section", "social-share-twitter");
  register_setting("social_share_config_section", "social-share-linkedin");
  register_setting("social_share_config_section", "social-share-reddit");
}

function social_share_facebook_checkbox()
{
?>
  <input type="checkbox" name="social-share-facebook" value="1" <?php checked(1, get_option('social-share-facebook'), true); ?> /> Check for Yes
<?php
}

function social_share_twitter_checkbox()
{
?>
  <input type="checkbox" name="social-share-twitter" value="1" <?php checked(1, get_option('social-share-twitter'), true); ?> /> Check for Yes
<?php
}

function social_share_linkedin_checkbox()
{
?>
  <input type="checkbox" name="social-share-linkedin" value="1" <?php checked(1, get_option('social-share-linkedin'), true); ?> /> Check for Yes
<?php
}

function social_share_reddit_checkbox()
{
?>
  <input type="checkbox" name="social-share-reddit" value="1" <?php checked(1, get_option('social-share-reddit'), true); ?> /> Check for Yes
<?php
}

add_action("admin_init", "social_share_settings");

// Displaying the Social Sharing Buttons

// function add_social_share_icons()
// {
//   echo 'do this please!';
//   $content = '';
//   $html = '<div class="social-share-wrapper">Share on: </div>';
//   echo $html;
//   global $post;

//   $html = "<div class='social-share-wrapper'><div class='share-on'>Share on: </div>";
//   $url = get_permalink($post->ID);
//   $url = esc_url($url);

//   if (get_option("social-share-facebook") == 1) {
//     $html = $html . "<div class='facebook'><a target='_blank' href='http://www.facebook.com/sharer.php?u=" . $url . "'>Facebook</a></div>";
//   }

//   if (get_option("social-share-twitter") == 1) {
    
//     $html = $html . "<div class='twitter'><a target='_blank' href='http://twitter.com/intent/tweet?text=Currently reading &lt;?php the_title(); ?&gt;&amp;url=&lt;?php the_permalink(); ?&gt;'>Twitter</a></div>";
//     // $html = $html . "<div class='twitter'><a target='_blank' href='https://twitter.com/share?url=" . $url . "'>Twitter</a></div>";
//   }

//   if (get_option("social-share-linkedin") == 1) {
//     $html = $html . "<div class='linkedin'><a target='_blank' href='http://www.linkedin.com/shareArticle?url=" . $url . "'>LinkedIn</a></div>";
//   }

//   if (get_option("social-share-reddit") == 1) {
//     $html = $html . "<div class='reddit'><a target='_blank' href='http://reddit.com/submit?url=" . $url . "'>Reddit</a></div>";
//   }

//   $html = $html . "<div class='clear'></div></div>";

//   return $content = $content . $html;
// }

// add_action('Nacelle_social_share_content', 'add_social_share_icons', 7);
