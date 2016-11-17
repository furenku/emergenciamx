<?php

get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();



      ?>


      <div id="page_<?php echo get_the_ID(); ?>" class="page single xrow rel ha pt4 pb2 m0">

         <div class="titulo xrow m2 p0 m0 text-center m0">
            <h1 class="p4">
               <?php echo get_the_title(); ?>
            </h1>
         </div>





         <div class="contenido medium-8 medium-centered fontL text-center black mb4 pt0">
            <?php echo apply_filters('the_content', get_the_content() );?>
         </div>

      </div>

      <?php
   }
}
?>


<script>

$(document).ready(function(){
   $('.contenido iframe').detach().appendTo('#video_holder')
})
</script>



<?php
get_footer();

?>
