<!doctype html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Emergencia MX</title>
   <?php wp_head(); ?>
</head>
<body class="black_bg">



   <!-- <div id="loading" class="w_100vw h_100vh absUpL black_bg z1k1">
      <div class="white text-center h_a" style="height:20vh; margin-top:40vh; padding:0;">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/emergencialogo.png" alt="" />
      </div>
   </div> -->

<?php

if( is_front_page() ) :

$contenido = get_page_by_title( 'Portada' ) -> post_content;
$contenido = apply_filters( 'the_content', $contenido );

$logo = get_stylesheet_directory_uri() . '/img/emergencialogo_grande.png';

         ?>


   <div id="portada" class="columns h_60vh rel">
      <div id="portada_fondo" class="absUpL w_100 h_100 z1">
         <div class="diapositiva imgLiquid imgLiquidFill xrow h_75vh hidden">
         </div>
      </div>
      <div class="w_100 text-center absUpL white h_100 z1">
         <div class="texto small-12  medium-10 medium-centered large-8 large-centered h_100">
            <div class="medium-6 columns text-left titulo vcenter">
               <img src="<?php echo $logo; ?>" alt="" />
            </div>
            <div class="contenido medium-6 columns fontXL text-left h_100">
               <div class="vcenter">
                  <?php echo $contenido; ?>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php endif; // is_front_page ?>


   <div id="header-videos" class="columns ha p0 black_bg">
   <header id="cabecera" class="columns <?php echo is_front_page() ? "h_20vh" : "h_10vh"; ?> z1k1 p0" data-sticky-container>
      <div class="sticky columns p0  <?php echo is_front_page() ? "h_20vh" : "h_10vh"; ?>" data-sticky data-anchor="header-videos" data-margin-top="0" data-sticky-on="small">

         <div id="cabecera-contenedor" class="columns p0 h_10vh black_bg">
            <!-- #busqueda.small-3.medium-2.large-1.columns.text-center>span.fa.fa-search.fontXL -->
            <div id="busqueda-boton" class="small-3 medium-2 large-1 columns text-center h_100">

               <div class="vcenter">
                  <span class="fa fa-search fontXL" data-toggle="offCanvas"></span>
               </div>

            </div>


            <!-- #menu.hide-for-small.medium-8.large-10.columns.text-center>span.fa.fa-search.fontXL -->
            <nav id="menu" class="hide-for-small-only medium-7 large-8 columns small-text-center medium-text-right h_100 black_bg">

               <?php
               wp_nav_menu( array(
                  'menu' => 'principal',
                  'container' => '',
                  'walker' => new emmx_menu_walker,
                  'items_wrap' => '%3$s'
               ) );
               ?>
            </nav>


            <!-- #mostrar_menu.small-3.medium-2.large-1.columns.text-center>span.fa.fa-bars.fontXL -->
            <div id="logotipo" class="small-8 medium-3 columns small-text-center medium-text-right h_100 p3">
               <a href="<?php echo site_url(); ?>" class="row h_100 imgLiquid imgLiquidNoFillRight">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/emergencialogo-e-2x.png" alt="" />
               </a>
            </div>
            <div id="mostrar_menu" class="show-for-small-only small-2 columns text-right h_100"><span class="fa fa-bars fontXL vcenter columns"></span></div>


         </div>
         <div id="cabecera-busqueda" class="columns p0 h_10vh black_bg hidden">
            <div id="busqueda-formulario" class="small-12 medium-8 large-6 columns text-center h_100">

                  <?php get_search_form(); ?>

            </div>
         </div>

         <?php if( is_front_page() ) : ?>

         <div class="columns p0 h_10vh">


            <div id="navegacion_videos" class="row xrow small-12 m0 p0 color_negro_bg">

               <div id="navegacion_archivo" class="columns xrow small-12 m0 p0">
                  <div>


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


                  </div>


                  <div id="cargando-contenedor" class="columns w_100vw h_5vh rel mt2 z1k1 p0">
                     <div class="columns mt2 p1 fontS bold white fwb ha text-right m0">
                        <span class="black_bg p2">
                           Cargando: <span class="cargando">0%</span>%
                        </span>
                     </div>
                     <div id="cargando-barra" class="columns white_bg z1k1 m0" style="height:3px">
                     </div>
                  </div>


               </div><!-- #navegacion_archivo -->

            </div>

            <?php endif; ?>

         </div>

      </header>
