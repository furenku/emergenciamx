<?php
/* Template Name: Otros Proyectos */

get_header();

$tipos_proyectos = array("Colaboraciones", "En Curso");

if( have_posts() ) :
   while ( have_posts() ) :
      the_post();

      ?>

      <div id="post_<?php echo get_the_ID(); ?>" class=" post single xrow rel ha pt4 pb2 m0">

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
      global $post;

      $tipos_proyecto = get_pages( array( 'parent'=>  $post->ID, 'child_of'=>  get_the_ID() ) );


   endwhile;
endif;


?>
<div id="otros_proyectos" class="row columns text-center p5 white_bg">

   <?php foreach( $tipos_proyecto as $tipo_proyecto ) : ?>

      <div id="<?php echo strtolower($tipo_proyecto->post_title); ?>" class="tipo_proyecto columns">

         <h2 class="pattern">
            <?php echo $tipo_proyecto->post_title; ?>
         </h2>

         <div class="proyectos columns mt1">
            <?php
            $cat_id = get_term_by( 'name', $tipo_proyecto->post_title, 'proyecto_tipo' )->term_id;

            $q = new WP_Query(
            array(
               'post_type' => 'proyecto',
               'tax_query' => array(
                  array(
                     'taxonomy' => 'proyecto_tipo',
                     'field'    => 'term_id',
                     'terms'    => $cat_id,
                  )  )
               )
            );

            if( $q->have_posts() ) :
               while ( $q->have_posts() ) :
                  $q->the_post();
                  ?>

                  <article class="proyecto medium-4 columns p3 end">

                     <a href="<?php echo get_the_permalink(); ?>">

                        <div class="imagen columns small-8 small-offset-2 end imgLiquid imgLiquidNoFill h_20vh mb1">
                           <?php echo get_the_post_thumbnail( get_the_ID(), "post-thumbnail" ); ?>
                        </div>
                        <div class="p3 mt1">
                           <h4 class="black">
                              <?php echo get_the_title(); ?>
                           </h4>
                        </div>
                        <div class="p3 mt1 extracto text-left">
                           <p class="black">
                              <?php echo get_the_excerpt(); ?>
                           </p>
                        </div>

                     </a>

                  </article>
                  <?php
               endwhile;
            endif;

            ?>

         </div>
      </div>

   <?php endforeach; ?>

</div>




<script>

$(document).ready(function(){
   $('.contenido iframe').detach().appendTo('#video_holder')
})

</script>



<?php get_footer(); ?>
