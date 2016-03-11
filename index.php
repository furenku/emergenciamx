<?php get_header(); ?>

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
            <!-- <img src="http://loremflickr.com/<?php echo (ceil( rand(4,9) * 40 ) . "/" . ceil( rand(4,7) * 60 ));  ?>/environment?random=<?php echo $i; ?>" alt=""/> -->
            <img src="http://fakeimg.pl/<?php echo (ceil( rand(4,9) * 40 ) . "x" . ceil( rand(4,7) * 60 ));  ?>/<?php echo dechex( rand(0,255) ) . dechex( rand(0,255) ) . dechex( rand(0,255) ) ?>" alt=""/>
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


<?php get_footer(); ?>
