<?php
/* Template Name: Otros Proyectos */

get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();

      ?>


      <div id="post_<?php echo get_the_ID(); ?>" class=" post single xrow rel ha pt4 pb2 m0">

         <div class="titulo xrow m2 p0 m0 text-center m0">
            <h2 class="p4">
               <?php echo get_the_title(); ?>
            </h2>
         </div>


         <div class="contenido medium-8 medium-centered fontL text-center black mb4 pt0">
            <?php echo apply_filters('the_content', get_the_content() );?>
         </div>
      </div>

      <div id="otros_proyectos" class="columns text-center p5 white_bg">

         <?php
         $q = new WP_Query( array( 'post_type' => 'proyecto', 'cat'=>$cat_id));

         if( $q->have_posts() ) :
            while ( $q->have_posts() ) :
               $q->the_post();
               ?>

               <div class="proyecto medium-4 columns p5 end">
                  <div class="imagen columns small-8 small-offset-2 end imgLiquid imgLiquidNoFill h_20vh mb1">
                     <?php echo get_the_post_thumbnail( get_the_ID(), "post-thumbnail" ); ?>
                  </div>
                  <div class="p3 mt1">
                     <h4>
                        <?php echo get_the_title(); ?>
                     </h4>
                  </div>
               </div>
               <?php
            endwhile;
         endif;

         ?>

      </div>
      <?php
   }
} else {
   /* No posts found */
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
