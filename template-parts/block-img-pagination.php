   <?php
    $prev = get_previous_post();
    $next = get_next_post();
    // the previous post title and thumbnail
    // https://njengah.com/wordpress-next-previous-post-with-thumbnail-pagination/
    ?>

   <div class="grid-x medium-up-2 align-stretch">

       <div class="cell pr-medium-1 mb-2">
           <h4 class="pl-3">
               <a href="<?php echo get_permalink($prev->ID); ?>">
                   <?php get_template_part('template-parts/svg/icon', 'left'); ?> Prev </a>
           </h4>
           <div class="grid-x medium-up-2 px-2 grid-padding-y pag-img-wrapper">
               <div class="cell">
                   <a href="<?php echo get_permalink($prev->ID); ?>">
                       <?php echo apply_filters('the_title', $prev->post_title); ?>
                   </a>
               </div>
               <div class="cell auto mr-2 text-center">
                   <a href="<?php echo get_permalink($prev->ID); ?>">
                       <?php echo get_the_post_thumbnail($prev->ID, 'thumbnail'); ?>
                   </a>
               </div>
           </div>
       </div>

       <div class="cell pl-medium-1">
           <h4 class="text-right pr-3">
               <a href="<?php echo get_permalink($next->ID); ?>">Next <?php get_template_part('template-parts/svg/icon', 'right'); ?></a>
           </h4>
           <div class="grid-x medium-up-2 px-2 grid-padding-y pag-img-wrapper">
               <div class="cell auto mr-2 text-center">
                   <a href="<?php echo get_permalink($next->ID); ?>">
                       <?php echo get_the_post_thumbnail($next->ID, 'thumbnail'); ?>
                   </a>
               </div>
               <div class="cell">
                   <a href="<?php echo get_permalink($next->ID); ?>">
                       <?php echo apply_filters('the_title', $next->post_title); ?>
                   </a>
               </div>
           </div>
       </div>
   </div>