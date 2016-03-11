<!doctype html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Foundation for Sites</title>
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,300' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="bower_components/slick-carousel/slick/slick.css">
   <link rel="stylesheet" href="bower_components/slick-carousel/slick/slick-theme.css">
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

      <div id="portada" class="xrow h_75vh rel">
         <div id="portada_fondo" class="absUpL w_100 h_100 z-1">
            <?php for ($i=0; $i < 6; $i++) : ?>
               <div class="diapositiva imgLiquid imgLiquidFill xrow h_75vh">
                  <img src="http://placeimg.com/<?php echo rand(1000,1200); ?>/<?php echo rand(350,450); ?>/people?random="<?php echo $i ?> alt=""/>
                  <!-- <img src="http://placeimg.com/1200/350/people" alt=""> -->
               </div>
            <?php endfor; ?>
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
               <div class="medium-6 columns">loremflickr
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

      <div id="entradas" class="row">

         <?php for ($i=0; $i < 24; $i++) : ?>

            <div class="entrada rel medium-<?php echo (($i%2)+1)*2; ?> h_<?php echo (($i%2)+2)*10; ?>vh columns">
               <div class="imgLiquid imgLiquidFill w_100 h_100 absUpL z-1">
                  <!-- <img src="http://placeimg.com/<?php echo (ceil( rand(4,9) * 40 ) . "/" . ceil( rand(4,7) * 60 ));  ?>/people?random=<?php echo $i; ?>" alt=""/> -->
                  <img src="http://loremflickr.com/<?php echo (ceil( rand(4,9) * 40 ) . "/" . ceil( rand(4,7) * 60 ));  ?>/environment?random=<?php echo $i; ?>" alt=""/>
                  <!-- <img src="http://fakeimg.pl/<?php echo (ceil( rand(4,9) * 40 ) . "x" . ceil( rand(4,7) * 60 ));  ?>/<?php echo dechex( rand(0,255) ) . dechex( rand(0,255) ) . dechex( rand(0,255) ) ?>" alt=""/> -->
               </div>
               <div class="info row h_100 hidden text-center">
                  <div class="cortina w_100 h_100 absUpL z0"></div>
                  <div class="info_texto w_100 h_100 absUpL z1">
                     <div class="vcenter">
                        <h6>Nombre De la Entrada</h6>
                        <span class="row"><b>Temática</b></span>
                        <span class="row" class="fontM">Diciembre 2014</span>
                     </div>
                  </div>
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
   <script src="bower_components/slick-carousel/slick/slick.min.js"></script>
   <script src="js/frontendutils.js"></script>
   <script src="js/app.js"></script>
</body>
</html>
