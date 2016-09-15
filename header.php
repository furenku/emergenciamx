<!doctype html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Emergencia MX</title>
   <?php wp_head(); ?>
</head>
<body class="color_negro_bg">



   <!-- markup para iniciar offcanvas -->
   <div class="off-canvas-wrapper">
       <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
         <div class="off-canvas position-left" id="offCanvas" data-off-canvas>

            <div id="menu-busqueda" class="p4">
               <div class="columns p5">

              <!-- Close button -->
              <button class="close-button" aria-label="Close menu" type="button" data-close>
                <span aria-hidden="true" class="fa fa-close"></span>
              </button>
           </div>

           <div class="columns p5">

             <?php get_search_form(); ?>

           </div>
           <div class="columns p5">
             <ul>
                <?php
               $ID = get_term_by('name','Archivo','category')->term_id;
               $categorias = get_categories( array('parent'=>$ID,'hide_empty'=>0) );
               foreach( $categorias as $categoria ) :
                  ?>

                  <a href="<?php echo get_the_permalink( get_the_ID() ); ?>">
                     <li class="selector-categoria columns fontM p3 button " data-categoria="<?php echo $categoria -> cat_ID; ?>">
                        <?php echo $categoria->name ?>
                     </li>
                  </a>

                  <?php
               endforeach;
               ?>
             </ul>
          </div>

        </div>
           <!-- Menu -->


         </div>

         <div class="off-canvas-content" data-off-canvas-content>

         <!-- markup para iniciar offcanvas -->

            <header id="cabecera" class="w_100 h_10vh fxd op0 z1k1">
               <!-- #busqueda.small-3.medium-2.large-1.columns.text-center>span.fa.fa-search.fontXL -->
               <div id="busqueda" class="small-3 medium-2 large-1 columns text-center h_100">

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
               <div id="logotipo" class="small-8 medium-3 columns small-text-center medium-text-right h_100">
                  <a href="<?php echo site_url(); ?>">
                     <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/emergencialogo.png" alt="" />
                  </a>
               </div>
               <div id="mostrar_menu" class="show-for-small-only small-2 columns text-right h_100"><span class="fa fa-bars fontXL vcenter columns"></span></div>
            </header>
