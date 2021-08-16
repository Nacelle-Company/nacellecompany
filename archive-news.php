<?php
/*
Template Name: News
*/

get_header(); ?>
<?php
$img_size_lg = 'fp-large';
$img_size_md = 'fp-medium';
$img_size_sm = 'fp-small';

$hero_image = get_field('news_header_image', 'option');
$news_icon = get_field('news_icon', 'option');

/* Get custom sizes of our image sub_field */
$hero_lg = $hero_image['sizes'][$img_size_lg];
$hero_md = $hero_image['sizes'][$img_size_md];
$hero_sm = $hero_image['sizes'][$img_size_sm];



if (!empty('news_header_image')) : ?>
  <?php get_template_part('template-parts/featured-image'); ?>
<?php endif; ?>
<main class="main-container">
  <div class="main-grid">
    <div class="main-content archive">
      <?php if (have_posts()) : ?>

        <?php //Start the Loop  
        ?>
        <?php while (have_posts()) : the_post();
          $time = get_the_time('F j, Y', $mypost->ID);
          $timeShort = get_the_time('o-m-j', $mypost->ID);
          $post_type = get_post_type();
          $post_type_data = get_post_type_object($post_type);
          $post_type_slug = $post_type_data->rewrite['slug'];
          $post_type_name = ucwords(rtrim(trim(str_replace('-',  ' ', $post_type_slug))));

        ?>

          <?php $link = get_field('link_to_article'); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class('cell'); ?>>

            <div class="grid-x grid-padding-y feed-container">

              <?php //If a featured image is set, insert into layout and use Interchange
              // to select the optimal image size per named media query. 
              ?>
              <?php if (has_post_thumbnail($post->ID)) : ?>

                <?php //image 
                ?>
                <div class="cell medium-4">

                  <?php //if ($link) : 
                  ?>
                  <a href="<?php the_permalink(); ?>">
                    <img class="slideInFromBottom" data-interchange="[<?php the_post_thumbnail_url('fp-small'); ?>, small], [<?php the_post_thumbnail_url('fp-medium'); ?>, medium], [<?php the_post_thumbnail_url('fp-large'); ?>, large], [<?php the_post_thumbnail_url('fp-xlarge'); ?>, xlarge]">
                    <?php echo '</a>'; ?>
                    <?php // endif; 
                    ?>

                </div>

                <div class="cell medium-8 archive-title pl-medium-3">

                  <?php //title 
                  ?>
                  <div class="grid-x">
                    <?php // oldschool title
                    if (is_single()) {
                      the_title('<h3 class="entry-title">', '</h3>');
                    } else {
                      the_title('<h4 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
                    }
                    ?>
                  </div>

                  <footer class="grid-x flex-container flex-dir-column medium-flex-dir-row align-justify align-bottom">

                    <div class="flex-container flex-child-shrink date">
                      <time datetime="<?php echo $timeShort; ?>">
                        <?php
                        echo $time; ?>
                      </time>
                    </div>

                    <?php //microphone 
                    ?>
                    <div class="flex-container flex-child-auto align-bottom cats">
                      <div class="cats-wrapper">
                        <p class="mb-0"><?php echo $post_type_name; ?></p>
                      </div>
                      <div class="mic">
                        <img src="<?php echo $news_icon; ?>" />
                      </div>
                    </div>

                  </footer>

                </div>


              <?php elseif (empty(has_post_thumbnail($post->ID))) : ?>
                <div class="cell medium-12 archive-title">
                  <div class="grid-x">
                    <?php
                    if (is_single()) {
                      the_title('<h4 class="entry-title">', '</h4>');
                    } else {
                      the_title('<h4 class="entry-title"><a href="' . esc_url($link) . '" target="_blank">', '</a></h4>');
                    }
                    echo '</a>';
                    ?>
                  </div>

                  <?php //meta info 
                  ?>
                  <footer class="grid-x small-up-2">

                    <?php //date 
                    ?>
                    <div class="cell date">
                      <p><?php the_time('m.j.y'); ?></p>
                    </div>

                    <?php //microphone 
                    ?>
                    <div class="cell text-right mic">
                      <img src="<?php echo $news_icon; ?>" />
                    </div>

                  </footer>
                </div>
              <?php endif; ?>

            </div>
          </article>

        <?php endwhile; ?>

      <?php else : ?>
        <?php get_template_part('template-parts/content', 'none'); ?>

      <?php endif; // End have_posts() check.
      ?>

    </div>
    <?php wp_reset_query(); ?>
    <?php get_sidebar(); ?>

  </div>
  <?php /* Display navigation to next/previous pages when applicable */ ?>
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
</main>

<?php get_footer();
