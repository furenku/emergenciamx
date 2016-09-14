<?php

get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();



      $cats = get_the_category(get_the_ID());
      $cat_ids = array();
      $cat_str = "";
      foreach($cats as $i => $c ) {
         array_push( $cat_ids,  $c->term_id );

         $cat_str .= '<a href="' . get_category_link($c->term_id) . '" class="red">';
            $cat_str .= $c->name != "Sin categoría" ? $c->name : '';
         $cat_str .= '</a>';

         $cat_str .= $i < count( $cats ) - 1  ? ', ' : '';
      }
      ?>


      <div id="post_<?php echo get_the_ID(); ?>" class="pt4 rel post single xrow ha p0 m0">
         <div class="video_holder z-1 ovyh p0">
         </div>
         <div class="titulo xrow m2 p0 m0 text-center m0">
            <h2 class="p4">
               <?php echo get_the_title(); ?>
            </h2>
         </div>


         <div class="fecha row text-right fontM black p0 mt2 text-center">
            Publicado el <?php echo get_the_date(); ?>
         </div>



         <div class="contenido medium-8 medium-centered fontL text-center black mb4 pt0">
            <?php echo apply_filters('the_excerpt', get_the_excerpt() );?>
         </div>
      </div>
      
      <?php
   }
}

?>


<script>

   $(document).ready(function(){
      $('.contenido iframe').detach().appendTo('.video_holder')
   })
</script>



<?php
get_footer();

?>
