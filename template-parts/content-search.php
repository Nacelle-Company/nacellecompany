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

// callout text
// $callout = wp_strip_all_tags(get_field('intro'));
// echo $callout;

?>
<article class="cell">

    <div class="media-object feed-container stack-for-small py-2">

        <?php // image 
        ?>
        <?php if (get_the_post_thumbnail()) : ?>
            <div class="media-object-section">
                <a href="<?php echo get_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail', array('class' => 'align-left')); ?>
                </a>
            </div>
        <?php else : ?>
            <?php $zeroLeftPadding = '0'; ?>
        <?php endif; ?>

        <?php // title 
        ?>
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

            <footer class="grid-x">

                <?php // date 
                ?>
                <div class="cell medium-6 date">
                    <p><?php the_time('m.j.y'); ?></p>
                </div>

                <?php // microphone 
                ?>
                <div class="cell medium-6 text-right mic">
                    <img src="<?php echo $news_icon; ?>" />
                </div>

            </footer>

        </div>

    </div>
</article>
<?php
if (function_exists('Nacelle_pagination')) :
    Nacelle_pagination();
elseif (is_paged()) :
?>
    <nav id="post-nav">
        <div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'nacelle')); ?></div>
        <div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'nacelle')); ?></div>
    </nav>
<?php endif; ?>
