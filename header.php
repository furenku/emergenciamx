<!doctype html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Emergencia MX</title>
   <?php wp_head(); ?>
</head>
<body>

   <header id="cabecera" class="w_100 h_10vh fxd op0 z1">
      <!-- #busqueda.small-3.medium-2.large-1.columns.text-center>span.fa.fa-search.fontXL -->
      <div id="busqueda" class="small-3 medium-2 large-1 columns text-center h_100">
         <div class="vcenter">
            <span class="fa fa-search fontXL"></span>
         </div>

      </div>
      <!-- #menu.hide-for-small.medium-8.large-10.columns.text-center>span.fa.fa-search.fontXL -->
      <nav id="menu" class="hide-for-small-only medium-7 large-8 columns small-text-center medium-text-right h_100 black_bg">
         <li class="h_100">
            <div class="vcenter uppercase fwb fontM p0 fl w_sm_100 wa_md columns end">
               Navegar archivo
            </div>
         </li>

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
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/emergencialogo.png" alt="" />
      </div>
      <div id="mostrar_menu" class="show-for-small-only small-2 columns text-right h_100"><span class="fa fa-bars fontXL vcenter columns"></span></div>
   </header>

   <div class="xrow main-scroller h_100vh scrollH">
