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
            <h1 class="">Emergencia MX</h1>
         </div>
         <div class="medium-6 columns fontXL text-left texto h_100">
            <div class="vcenter">
               <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia sint beatae odio similique fuga ullam, illo quo incidunt aliquid. Dignissimos accusamus doloremque cumque et voluptatum, eum inventore est distinctio magni.
               </p>
               <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed rerum consequuntur sapiente alias nostrum! Temporibus.
               </p>
            </div>
         </div>
      </div>
   </div>
</div>

<div id="linea-de-tiempo-fondo" class="xrow h_10vh text-center p0 hidden">

</div>
<div id="linea-de-tiempo" class="xrow h_10vh text-center p0 pt1">
   <?php for ($i=0; $i < 6; $i++) : ?>

      <div class="selector-tiempo shareW fl p0">
         <span class="texto-tiempo fontL uppercase row m0">
            <?php echo $i < 5 ? (2011 + $i) : 'Más';  ?>
         </span>
         <div class="punto-tiempo-contenedor row">
            <?php echo $i < 5 ? '<span class="punto-tiempo small-centered"></span>' : '<span class="fa fa-angle-right fontXL"></span>'; ?>
         </div>
      </div>

   <?php endfor; ?>
</div>

<div id="videos" class="xrow">

   <?php
   $args = array('post_type'=>'video','posts_per_page'=>-1,'category_name'=>'videos');
   $q = new WP_Query($args);
   $i=0;
   if($q->have_posts()):
      while($q->have_posts()):
         $q->the_post();
         $i++;
         ?>



      <div class="video rel medium-<?php echo ((i%5)+2)*2; ?> h_<?php echo (($i%3)+3)*10; ?>vh columns">
         <a href="<?php echo get_the_permalink(); ?>">
            <div class="imagen imgLiquid imgLiquidFill w_100 h_100 absUpL z-1">
               <?php echo get_the_post_thumbnail(); ?>
            </div>
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
