<?php

/**
 * The template for displaying press_release archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<header class="primary featured-hero">
    <div class="grid-x">
        <div class="cell">
            <h1 class="text-center">Press Releases</h1>
        </div>
    </div>
</header>

<main class="main-container">
    <div class="main-grid">
        <div class="main-content archive press-release">
            <div class="grid-x grid-margin-x grid-padding-y small-up-1 medium-up-2 post-grid">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        $time = get_the_time('F j, Y', $mypost->ID);
                        $timeShort = get_the_time('o-m-j', $mypost->ID);
                        $theTitle = get_field('title', false, false);
                        $news_icon = get_field('news_icon', 'option');
                        if (has_post_thumbnail($post->ID)) :
                ?>
                            <article id="post-<?php the_ID(); ?>" class="cell media-object card stack-for-small">
                                <div class="flex-container flex-dir-column medium-flex-dir-row">
                                    <div class="media-object-section">
                                        <?php
                                        echo '<a href="' . get_permalink() . '">';
                                        if (has_post_thumbnail()) : the_post_thumbnail('thumbnail');
                                        endif;
                                        echo '</a>';
                                        ?>
                                    </div>
                                    <div class="media-object-section">
                                        <time datetime="<?php echo $timeShort; ?>">
                                            <?php
                                            echo $time; ?>
                                        </time>
                                        <p class="lead mb-0">
                                            <?php
                                            echo '<a href="' . get_permalink() . '">';
                                            echo $theTitle;
                                            echo '</a>';
                                            ?>
                                        </p>
                                    </div>
                                    <a class="go-corner" href="<?php echo get_permalink($mypost->ID); ?>">
                                        <div class="go-arrow">
                                            →
                                        </div>
                                    </a>
                                </div>
                            </article>
                        <?php
                        else :
                        ?>
                            <article class="cell medium-12 archive-title">

                                <div class="grid-x">

                                    <?php // microphone 
                                    ?>
                                    <div class="cell small-2 medium-1">
                                        <img class="mic" src="<?php bloginfo('template_directory'); ?>/dist/assets/images/comedy-dynamics-mic.png" alt="comedy microphone" />
                                    </div>

                                    <?php // article title 
                                    ?>
                                    <div class="cell small-10 medium-11">
                                        <?php // oldschool title
                                        if (is_single()) {
                                            the_title('<h3 class="entry-title">', '</h3>');
                                        } else {
                                            the_title('<h4 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
                                        }
                                        ?>
                                    </div>

                                </div>

                                <footer class="grid-x">

                                    <?php // admin edit link 
                                    ?>
                                    <div class="cell small-2 medium-1">

                                        <?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>
                                        <?php $tag = get_the_tags();
                                        if ($tag) {
                                        ?>
                                            <p><?php the_tags(); ?></p>
                                        <?php
                                        } ?>

                                    </div>

                                    <?php // date and read more 
                                    ?>
                                    <div class="cell small-10 medium-11">

                                        <div class="grid-x small-up-2">

                                            <div class="cell">
                                                <p><?php the_time('m.j.y'); ?></p>
                                            </div>
                                            <div class="cell text-right">
                                                <a class="clear button success medium" href="<?php echo get_permalink(); ?>">More on this article. . .</a>
                                            </div>

                                        </div>

                                    </div>

                                </footer>

                            </article>
                    <?php
                        endif;
                    endwhile;
                else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer();
