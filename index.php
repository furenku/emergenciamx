<?php get_header(); ?>

<div id="portada" class="xrow h_75vh rel">
   <div id="portada_fondo" class="absUpL w_100 h_100 z-1">
      <div class="diapositiva imgLiquid imgLiquidFill xrow h_75vh hidden">
      </div>
   </div>
   <div id="portada_cortina" class="cortina absUpL w_100 h_100 z0"></div>
   <div class="w_100 text-center absUpL white h_100">
      <div class="small-12  medium-10 medium-centered large-8 large-centered h_100">
         <div class="medium-6 columns text-left titulo vcenter">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/emergencialogo_grande.png" alt="" />
         </div>
         <div class="medium-6 columns fontL text-left texto h_100">
            <div class="vcenter">
               <?php
               echo apply_filters('the_content', get_page_by_title("Portada") -> post_content);
               ?>
            </div>
         </div>
      </div>
   </div>
</div>

<div id="linea-de-tiempo-fondo" class="xrow h_15vh text-center p0 hidden">

</div>
<div id="linea-de-tiempo" class="xrow h_10vh text-center p0 ">
   <?php
      for ($i=0; $i < 7; $i++) :
         $anno = $i < 5 ? (2011 + $i) : 'Más';
   ?>

      <div class="selector-tiempo cursor-pointer shareW vcenter fl" data-anno="<?php echo $anno; ?>">

         <span class="texto-tiempo fontM uppercase row m0">
            <?php echo $anno;  ?>
         </span>

         <div class="punto-tiempo-contenedor cursor-pointer row">
            <?php echo $i < 5 ? '<span class="punto-tiempo small-centered fa fa-circle"></span>' : '<span class="fa fa-angle-right fontXL"></span>'; ?>
         </div>

      </div>

   <?php endfor; ?>
</div>

<div id="videos" class="xrow">

   <?php

   $args = array( 'post_type'=>'video', 'posts_per_page'=>-1 );

   $q = new WP_Query($args);
   $i=0;
   if($q->have_posts()):
      while($q->have_posts()):
         $q->the_post();
         $i++;
         ?>


      <?php $anno = date('Y',strtotime($post->post_date)); ?>

      <div class="video rel medium-<?php echo ((i%5)+2)*2; ?> h_<?php echo (($i%3)+3)*10; ?>vh columns" data-anno="<?php echo $anno; ?>">
         <a href="<?php echo get_the_permalink(); ?>">
            <div class="imagen imgLiquid imgLiquidFill w_100 h_100 absUpL z-1">
               <?php echo get_the_post_thumbnail(get_the_ID(),'thumb'); ?>
            </div>
            <div class="cortina w_100 h_100 abs z-1 p0 m0"></div>
            <div class="info row h_100 text-center op0">
               <!-- <div class="cortina w_100 h_100 absUpL z0"></div> -->
               <div class="info_texto w_100 h_100 absDownL z-1 white">
                  <div class="vcenter">
                     <h6 class="m0 fontL ">
                        <?php echo get_the_title(); ?>
                     </h6>
                     <span class="m0 p1 row fontXS">
                        <b>Categoría 1, Categoría 2</b>
                     </span>
                     <span class="m0 row" class="fontS">
                        <?php echo get_the_date(); ?>
                     </span>
                  </div>
               </div>
            </div>
         </a>
      </div>

         <?php
      endwhile;
   endif;
   ?>

</div>


<?php get_footer(); ?>
