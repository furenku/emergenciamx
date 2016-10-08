<?php
get_header();

$contenido = get_page_by_title( 'Portada' ) -> post_content;
$contenido = apply_filters( 'the_content', $contenido );

$logo = get_stylesheet_directory_uri() . '/img/emergencialogo_grande.png';


?>

<div id="portada" class="xrow h_75vh rel">
   <div id="portada_fondo" class="absUpL w_100 h_100 z-1">
      <div class="diapositiva imgLiquid imgLiquidFill xrow h_75vh hidden">
      </div>
   </div>
   <!-- <div id="portada_cortina" class="cortina absUpL w_100 h_100 z0"></div> -->
   <div class="w_100 text-center absUpL white h_100">
      <div class="small-12  medium-10 medium-centered large-8 large-centered h_100">
         <div class="medium-6 columns text-left titulo vcenter">
            <img src="<?php echo $logo; ?>" alt="" />
         </div>
         <div class="contenido medium-6 columns fontL text-left texto h_100">
            <div class="vcenter">
               <?php echo $contenido; ?>
            </div>
         </div>
      </div>
   </div>
</div>

<div id="navegacion_videos" class="row xrow small-12 m0 p0 color_negro_bg">

   <div id="navegacion_archivo" class="columns xrow small-12 m0 p0" data-sticky-container>
      <div class="sticky columns p0 h_10vh" data-sticky data-anchor="navegacion_videos" data-margin-top="4">


         <div id="barra-categorias" class="columns h_10vh text-center abs z1k1 p0 color_blanco color_gris_oscuro_bg z1k1">
            <?php
            $ID = get_term_by('name','Archivo','category')->term_id;
            $categorias = get_categories( array( 'parent'=>$ID ) );

            foreach( $categorias as $categoria ) :

               $sub_categorias = get_categories( array( 'parent'=>$categoria->cat_ID ) );

               ?>
               <li class="selector-categoria shareW fontM h_10vh p0 button secondary" data-categoria="<?php echo $categoria -> cat_ID; ?>">
                  <div class="vcenter p0">
                     <?php echo $categoria->name; ?>
                  </div>
               <?php
               if( count( $sub_categorias ) > 0 ) {
                  ?>
                  <ul class="hidden">
                     <?php foreach( $sub_categorias as $sub_categoria ) : ?>
                     <li class="selector-categoria shareW fontM h_10vh p0 button secondary" data-categoria="<?php echo $sub_categoria -> cat_ID; ?>">
                        <div class="vcenter p0">
                           <?php echo $sub_categoria->name; ?>
                        </div>
                     </li>
                     <?php endforeach; ?>
                  </ul>
                  <?php
               }
               ?>
               </li>
               <?php

            endforeach;

            ?>

         </div>

         <div id="barra-annos" class="columns medium-2 large-1 end hide-for-small-only pt2 color_blanco color_negro_bg">
            <ul class="h_80vh">
               <?php for ($i=0; $i < 7; $i++) : ?>
                  <li class="shareH selector-anno" data-anno="<?php echo $i<6 ? 2011+$i : ''; ?>">
                     <?php echo $i < 6 ? 2011 + $i : "Más"; ?>
                  </li>
               <?php endfor; ?>
            </ul>
         </div>
      </div>
   </div><!-- #navegacion_archivo -->

   <div id="videos" class="columns medium-10 min_80vh large-11 p0 z1">

      

   </div>


</div>
<?php get_footer(); ?>
