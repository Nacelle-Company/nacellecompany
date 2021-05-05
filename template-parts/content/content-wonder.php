<?php

/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php
// how to speed up ACF queries
// https://www.brianshim.com/webtricks/speed-up-wordpress-advanced-custom-fields-queries/
// https://www.billerickson.net/advanced-custom-fields-frontend-dependency/
	$rows = get_post_meta(get_the_ID(), 'layouts', true);
	foreach ((array) $rows as $count => $row) {
		switch ($row) {

				// Image with Text layout
			case 'img_txt':
				$bk_color = get_post_meta(get_the_ID(), 'layouts_' . $count . '_bk_color', true);
				if($bk_color)
					$bk_color = 'background-color:' . $bk_color . ';';
				$border = get_post_meta(get_the_ID(), 'layouts_' . $count . '_border', true);
				if($border)
					$border = 'border-bottom:10px solid ' . $border . ';';
					else $border = '';
				$fill_img = get_post_meta(get_the_ID(), 'layouts_' . $count . '_fill_img', true);
				if($fill_img) {
					$fill_img = ' grid-margin-y grid-padding-y fill-img align-bottom';
					$fill_img_cell = 'align-self-middle ';
				} else  {
					$fill_img = ' grid-margin-y grid-padding-y align-middle';
					$fill_img_cell = '';
				}
				$flip = get_post_meta(get_the_ID(), 'layouts_' . $count . '_flip', true);
				if($flip)
					$flip = ' medium-order-2';
					else $flip = '';
				$txt = get_post_meta(get_the_ID(), 'layouts_' . $count . '_txt', true);
				$btn = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn', true);
				if ($btn) :
					$btn_txt = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_txt', true);
					$btn_url = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_url', true);
					$btn_color = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_color', true);
					$btn_color = 'style="background:' . $btn_color . '";';
					$btn = '<a class="button" href="' . $btn_url . '"' . $btn_color . '>' . $btn_txt . '</a>';
				else : $btn = '';
				endif;
				$img_link = get_post_meta(get_the_ID(), 'layouts_' . $count . '_img_link', true);
				if($img_link) :
					$img_link_txt = get_post_meta(get_the_ID(), 'layouts_' . $count . '_img_link_txt', true);
					$img_link_url = get_post_meta(get_the_ID(), 'layouts_' . $count . '_img_link_url', true);
					$img_link = '<a href="' . $img_link_url . '" title="' . $img_link_txt . '"><figcaption class="text-center">' . $img_link_txt . ' »</figcaption></a>';
					else : $img_link = '';
				endif;
				$modal_link = get_post_meta(get_the_ID(), 'layouts_' . $count . '_modal_link', true);
				if ($modal_link) :
					$modal_link_txt = get_post_meta(get_the_ID(), 'layouts_' . $count . '_modal_link_txt', true);
					$modal_link_url = get_post_meta(get_the_ID(), 'layouts_' . $count . '_modal_link_url', true);
					$modal_link = '<a href="' . $modal_link_url . '" title="' . $modal_link_txt . '"><figcaption class="text-center">' . $modal_link_txt . ' »</figcaption></a>';
				else : $modal_link = '';
				endif;
				$modal_img_link = get_post_meta(get_the_ID(), 'layouts_' . $count . '_modal_img_link', true);
				if ($modal_img_link) :
					$modal_img_link_a = '<a href="' . $modal_img_link . '">';
					$modal_img_link_a_end = '</a>';
				else : 
					$modal_img_link_a = '';
					$modal_img_link_a_end = '';
				endif;
				$img = get_post_meta(get_the_ID(), 'layouts_' . $count . '_img', true);
				echo '<section class="sect sect-img_txt" style="' . $bk_color . $border . '">';
					echo '<div class="grid-x sect-wrap align-spaced' . $fill_img . '">';
						echo '<div class="' . $fill_img_cell . 'cell medium-5' . $flip . '">';
							echo apply_filters('the_content', $txt);
							echo $btn;
						echo '</div>';
						echo '<div class="cell medium-6">';
							echo '<a data-open="imgModal-' . $count . '">';
								echo '<figure class="align-center">' . wp_get_attachment_image( $img, 'large' ) . '</figure>';
							echo '</a>';
							echo $img_link;
						echo '</div>';
					echo '</div>';
				echo '</section>';
				// Image Modal
				echo '<div class="small reveal" id="imgModal-' . $count . '" data-reveal>';
					echo '<button class="close-button" data-close aria-label="Close reveal" type="button">';
						echo '<span aria-hidden="true">&times;</span>';
					echo '</button>';
					echo $modal_img_link_a;
						echo '<figure>' . wp_get_attachment_image($img, 'large') . '</figure>';
					echo $modal_img_link_a_end;
					echo $modal_link;
				echo '</div>';
				break;

			// Quote with Text layout
			case 'txt_quote':
				$bk_color = get_post_meta(get_the_ID(), 'layouts_' . $count . '_bk_color', true);
				if($bk_color)
					$bk_color = 'background-color:' . $bk_color;
				$bk_img = get_post_meta(get_the_ID(), 'layouts_' . $count . '_bk_img', true);
				if($bk_img)
					$bk_img = 'background-image:url(' . wp_get_attachment_image_url($bk_img, '') . ')';
				$bk_pos = get_post_meta(get_the_ID(), 'layouts_' . $count . '_bk_pos', true);
				if ($bk_pos)
					$bk_pos = 'background-position:' . $bk_pos;
				$txt = get_post_meta(get_the_ID(), 'layouts_' . $count . '_txt', true);
				$btn = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn', true);
				if ($btn) :
					$btn_txt = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_txt', true);
					$btn_url = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_url', true);
					$btn_color = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_color', true);
					$btn_color = 'style="background:' . $btn_color . '";';
					$btn = '<a class="button" href="'. $btn_url . '"' . $btn_color . '>' . $btn_txt . '</a>';
					else : $btn = '';
				endif;
				$quote = get_post_meta(get_the_ID(), 'layouts_' . $count . '_quote', true);
				echo '<section class="sect sect-txt_quote" style="' . $bk_color . ';' . $bk_img . ';' . $bk_pos . ';">';
					echo '<div class="grid-x sect-wrap grid-padding-y align-middle align-spaced">';
						echo '<div class="cell medium-5">';
							echo apply_filters('the_content', $txt);
							echo $btn;
						echo '</div>';
						echo '<div class="cell medium-5">';
							echo $quote;
						echo '</div>';
					echo '</div>';
				echo '</section>';
				break;

			// Banner layout
			case 'banner':
				$bk_color = get_post_meta(get_the_ID(), 'layouts_' . $count . '_bk_color', true);
				if ($bk_color)
					$bk_color = 'background-color:' . $bk_color;
				$bk_img = get_post_meta(get_the_ID(), 'layouts_' . $count . '_bk_img', true);
				if ($bk_img)
					$bk_img = 'background-image:url(' . wp_get_attachment_image_url($bk_img, '') . ')';
				$txt = get_post_meta(get_the_ID(), 'layouts_' . $count . '_txt', true);
				$btn = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn', true);
				if ($btn) :
					$btn_txt = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_txt', true);
					$btn_url = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_url', true);
					$btn_color = get_post_meta(get_the_ID(), 'layouts_' . $count . '_btn_color', true);
					$btn_color = 'style="background:' . $btn_color . '";';
					$btn = '<a class="button" href="' . $btn_url . '"' . $btn_color . '>' . $btn_txt . '</a>';
				else : $btn = '';
				endif;
				$width = get_post_meta(get_the_ID(), 'layouts_' . $count . '_width', true);
				$overlay = get_post_meta(get_the_ID(), 'layouts_' . $count . '_bk_img_ov', true);
				echo '<section class="sect sect-banner" style="' . $bk_color . ';' . $bk_img . ';">';
					echo '<div class="grid-x sect-wrap grid-margin-y grid-padding-y align-center-middle">';
						echo '<div class="cell ' . $width . '">';
							echo '<div class="overlay" style="opacity:.' . $overlay . '"></div>';
							echo apply_filters('the_content', $txt);
							echo $btn;
						echo '</div>';
					echo '</div>';
				echo '</section>';
				break;
	
		}
	}
	edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>');
?>

</article>