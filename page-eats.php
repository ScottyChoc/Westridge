<?php
/**
 * Template Name: Eats
 *
 * @package Westridge
 * @author  Scott Loveless
 * @license GPL-2.0+
 * @link    https://scott.loveless.org/
 */

add_action( 'genesis_entry_footer', 'westridge_recipe_loop' );
function westridge_recipe_loop() {

  $args = array(
    'post_type' => 'recipe', 
  );
  $loop = new WP_Query( $args );
  if( $loop->have_posts() ) {
    echo '
    <section id="recipes">
    <header class="entry-header">
    <h1 class="entry-title" itemprop="headline">Recipes</h1>
    </header>
    <div class="entry-content recipes" itemprop="recipes">
    
    ';
    // loop through posts
    while( $loop->have_posts() ): $loop->the_post();

    echo '
      <article class="recipe" itemprop="recipe">
        <a href="' . get_the_permalink() . '">
          <h2>' . get_the_title() . '</h2>
          ' . get_the_post_thumbnail() . '
        </a>
      </article>
        ';
      endwhile;
      echo '</div>';
      
  }
  wp_reset_postdata();
}

genesis();
