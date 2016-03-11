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
      <div id="busqueda" class="small-3 medium-2 large-1 columns text-center h_100"><span class="fa fa-search fontXL vcenter columns"></span></div>
      <!-- #menu.hide-for-small.medium-8.large-10.columns.text-center>span.fa.fa-search.fontXL -->
      <nav id="menu" class="hide-for-small medium-7 medium-offset-3 columns text-right h_100">
         <?php for ($i=1; $i <= 4; $i++) : ?>
            <div class="menu-elemento medium-3 columns right text-center h_100">
               <span class="vcenter columns">
                  <a href="#">
                     Menú <?php echo $i; ?>
                  </a>
               </span>
            </div>
         <?php endfor; ?>
      </nav>
      <!-- #mostrar_menu.small-3.medium-2.large-1.columns.text-center>span.fa.fa-bars.fontXL -->
      <div id="mostrar_menu" class="small-3 small-offset-6 hide-for-medium-up columns text-center h_100"><span class="fa fa-bars fontXL vcenter columns"></span></div>
   </header>

   <div class="xrow main-scroller h_100vh scrollH">
