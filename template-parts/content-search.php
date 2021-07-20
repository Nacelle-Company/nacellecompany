<?php

$news_icon = get_field('news_icon', 'option');

// other link
if (get_field('link_to_article')) {
    $link = get_field('link_to_article');
}

// trunkate the synopsis or content
$excerpt = get_field('synopsis');
$content = get_the_content();

$excerpt = wp_strip_all_tags($excerpt);
$content = wp_strip_all_tags($content);

$excerpt = substr($excerpt, 0, 200);
$content = substr($content, 0, 200);

$result = substr($excerpt, 0, strrpos($excerpt, ' '));
$contentResult = substr($content, 0, strrpos($content, ' '));

$time = get_the_time('F j, Y', $mypost->ID);
$timeShort = get_the_time('o-m-j', $mypost->ID);
?>

<article class="cell">
    <div class="media-object feed-container stack-for-small py-2">
        <?php if (get_the_post_thumbnail()) : ?>
            <div class="media-object-section">
                <a href="<?php echo get_permalink(); ?>">
                    <?php // the_post_thumbnail('thumbnail', array('class' => 'align-left')); 
                    $image = get_field('square_image');
                    if (!is_array($image)) {
                        $image = acf_get_attachment($image);
                    }
                    $alt = $image['alt'];
                    if ($image) :
                    ?>
                        <?php $image = get_the_post_thumbnail($mypost->ID, 'medium', array('title' => $theTitle, 'alt' => $theTitle));
                        echo $image; ?>
                    <?php else : the_post_thumbnail('medium'); ?>
                    <?php endif;
                    ?>
                </a>
            </div>
        <?php else : ?>
            <?php $zeroLeftPadding = '0'; ?>
        <?php endif; ?>

        <div class="archive-title media-object-section" style="padding-left:<?php echo $zeroLeftPadding; ?>">

            <div class="grid-y">

                <div class="cell">

                    <a href="<?php echo get_permalink(); ?>">
                        <?php
                        // title
                        $theTitle = wp_strip_all_tags(get_field('title'));
                        if (get_the_title()) {
                            the_title('<h3>', '</h3>');
                        } else {
                            echo '<h2>' . $theTitle . '</h2>';
                        }
                        ?>

                    </a>

                </div>

                <div class="cell">

                    <?php
                    if (get_the_content()) {
                        echo '<p>' . $contentResult . '. . .</p>';
                    } else {
                        echo '<p>' . $result . '. . .</p>';
                    }
                    ?>

                </div>

            </div>

            <footer class="grid-x flex-container flex-dir-column medium-flex-dir-row align-justify">
                <div class="flex-container flex-child-shrink date">
                    <time datetime="<?php echo $timeShort; ?>">
                        <?php
                        echo $time; ?>
                    </time>
                </div>
                <div class="flex-container flex-child-auto align-bottom cats">
                    <div class="cats-wrapper">
                        <p class="mb-0">
                            <?php
                            $taxonomy = 'category';
                            $post_type = get_post_type();
                            $post_type_data = get_post_type_object($post_type);
                            $post_type_slug = $post_type_data->rewrite['slug'];
                            $blog_slug = get_bloginfo('url');
                            $post_type_name = ucwords(rtrim(trim(str_replace('-',  ' ', $post_type_slug))));
                            $post_type_permalink = '<a href="' . $blog_slug . '/' . $post_type_slug . '">' . $post_type_name . '</a>';
                            // Get the term IDs assigned to post.
                            $post_terms = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
                            // Separator between links.
                            $separator = '&nbsp/&nbsp';
                            if (!empty($post_terms) && !is_wp_error($post_terms)) {
                                $term_ids = implode(',', $post_terms);
                                $terms = wp_list_categories(array(
                                    'title_li' => '',
                                    'style'    => 'none',
                                    'echo'     => false,
                                    'taxonomy' => $taxonomy,
                                    'include'  => $term_ids
                                ));
                                $terms = $post_type_permalink . ' / ' . rtrim(trim(str_replace('<br />',  $separator, $terms)), $separator);
                                // Display post categories.
                                echo  $terms;
                            } else {
                                if ($post_type) {
                                    echo $post_type_permalink;
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div class="mic">
                        <img src="<?php echo $news_icon; ?>" />
                    </div>

                </div>

            </footer>

        </div>

    </div>
</article>