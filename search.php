<?php

get_header();
?>

<div class="xrow white_bg min_80vh">
   <div class="row p5 ">

      <h1 class="mt4">Búsqueda: <?php echo get_search_query(); ?></h1>
      <?php

      if( have_posts() ) :
         while ( have_posts() ) :
            the_post();

            ?>


            <div id="post_<?php echo get_the_ID(); ?>" class="p5 columns columns large-10 end post single columns ha p0 m0">

               <div class="columns medium-5 large-4 imgLiquid imgLiquidFill h_25vh">
                  <?php echo get_the_post_thumbnail(); ?>
               </div>

               <div class="columns medium-7 large-8 imgLiquid imgLiquidFill">
                  <h4 class="">
                     <?php echo search_title_highlight(); ?>
                  </h4>


                  <div class="contenido text-left black p0">
                     <?php echo search_excerpt_highlight();?>
                  </div>
               </div>
            </div>

            <hr>

            <?php
         endwhile;
      endif;
      ?>


   </div>
</div>

<?php
get_footer();

?>
