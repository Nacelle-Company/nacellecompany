   <?php
    $prev = get_previous_post();
    $next = get_next_post();
    // the previous post title and thumbnail
    // https://njengah.com/wordpress-next-previous-post-with-thumbnail-pagination/
    ?>

   <div class="grid-x medium-up-2">

       <div class="cell">
           <div class="grid-x medium-up-2">
               <div class="cell">
                   <?php echo get_the_post_thumbnail($prev->ID, 'thumbnail'); ?>

               </div>
               <div class="cell">
                   <a href="<?php echo get_permalink($prev->ID); ?>">

                       <?php echo apply_filters('the_title', $prev->post_title); ?>

                   </a>
               </div>
           </div>
       </div>

       <div class="cell">
           <div class="grid-x medium-up-2">
               <div class="cell">
                   <?php
                    // the next post title and thumbnail
                    echo get_the_post_thumbnail($next->ID, 'thumbnail'); ?>
               </div>
               <div class="cell">
                   <a href="<?php echo get_permalink($next->ID); ?>">

                       <?php echo apply_filters('the_title', $next->post_title); ?>

                   </a>
               </div>
           </div>
       </div>
   </div>