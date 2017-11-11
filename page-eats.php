<?php
/**
 * Genesis Framework.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */


 function westridge_recipe_loop() {
    $args = array( 'post_type' => 'recipe' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
      echo '<a href="' . get_the_permalink() . '">' . the_title() . '</a>'; 
    //   echo '<div class="entry-content">';
    //   the_content();
    //   echo '</div>';
    endwhile;
    }

 add_action( 'genesis_entry_footer', westridge_recipe_loop);
genesis();
