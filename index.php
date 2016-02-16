<!doctype html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Foundation for Sites</title>
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,300' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/app.css">
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

      <div id="portada" class="xrow h_90vh rel">
         <div id="portada_fondo" class="imgLiquid imgLiquidFill absUpL w_100 h_100 z-1">
            <img src="http://fakeimg.pl/1200x350" alt="">
         </div>
         <div id="portada_cortina" class="cortina absUpL w_100 h_100 z0"></div>
         <div class="w_100 vcenter text-center absUpL">
            <h1>Emergencia MX</h1>
            <div class="small-8 small-centered">
               <div class="medium-6 columns">
                  <p>
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  </p>
               </div>
               <div class="medium-6 columns">
                  <p>
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  </p>
               </div>
            </div>
         </div>
      </div>

      <div id="linea-de-tiempo-fondo" class="xrow h_10vh text-center p0 hidden">

      </div>
      <div id="linea-de-tiempo" class="xrow h_10vh text-center p0">
         <?php for ($i=0; $i < 5; $i++) : ?>

            <div class="selector-tiempo shareW fl p2">
               <span class="texto-tiempo fontL uppercase row m0">
                  <?php echo 2011 + $i;  ?>
               </span>
               <div class="punto-tiempo-contenedor row">
                  <span class="punto-tiempo small-centered"></span>
               </div>
            </div>

         <?php endfor; ?>
      </div>

      <div id="entradas" class="row">

         <?php for ($i=0; $i < 24; $i++) : ?>

            <div class="entrada rel medium-<?php echo (($i%2)+1)*2; ?> h_<?php echo (($i%2)+2)*10; ?>vh columns">
               <div class="imgLiquid imgLiquidFill w_100 h_100">
                  <img src="http://fakeimg.pl/<?php echo (ceil( rand(4,9) * 40 ) . "x" . ceil( rand(4,7) * 60 ));  ?>" alt=""/>
               </div>
            </div>

         <?php endfor; ?>

      </div>

   </div>

   <script src="bower_components/jquery/dist/jquery.js"></script>
   <script src="bower_components/what-input/what-input.js"></script>
   <script src="bower_components/foundation-sites/dist/foundation.js"></script>
   <script src="bower_components/isotope/dist/isotope.pkgd.min.js"></script>
   <script src="bower_components/imgLiquid/js/imgLiquid-min.js"></script>
   <script src="js/frontendutils.js"></script>
   <script src="js/app.js"></script>
</body>
</html>
