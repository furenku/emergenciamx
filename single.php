<?php

get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();
      echo get_the_title();
      echo get_the_content();
      var_dump(  get_post_meta() );
   }
} else {
   /* No posts found */
}

get_footer();

?>
