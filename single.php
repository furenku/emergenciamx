<?php

get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();
      ?>

      <div id="post_<?php echo get_the_ID(); ?>" class="post single xrow h_100vh white_bg p0 m0">
         <div class="video_holder">
         </div>
         <div class="titulo xrow m2 black p0 m0">
            <h1 class="p4  ">
               <?php echo get_the_title(); ?>
            </h1>
         </div>
         <div class="fecha row text-right fontXL black p0 mt2 mb2">
            <?php echo get_the_date(); ?>
         </div>
         <div class="xrow white_bg pb4">
            <div class="contenido row fontXL text-center white_bg black mb4 pb4">
               <?php echo apply_filters('the_content', get_the_content() );?>
            </div>
         </div>
      </div>
      <?php
   }
} else {
   /* No posts found */
}

<script>

   $(document).ready(function(){
      alert(123)
   })
</script>

get_footer();

?>
