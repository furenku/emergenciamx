<?php
get_header();

$contenido = get_page_by_title( 'Portada' ) -> post_content;
$contenido = apply_filters( 'the_content', $contenido );

$logo = get_stylesheet_directory_uri() . '/img/emergencialogo_grande.png';


?>
<div id="barra-annos" class="columns medium-2 large-1 end h_75vh hide-for-small-only pt2 color_blanco color_negro_bg" data-sticky-container>
   <div class="sticky columns p0 h_60vh" data-sticky data-anchor="header-videos" data-margin-top="8">
      <ul class="h_80vh">
         <?php for ($i=0; $i < 7; $i++) : ?>
            <li class="shareH selector-anno" data-anno="<?php echo $i<6 ? 2011+$i : ''; ?>">
               <?php echo $i < 6 ? 2011 + $i : "Más"; ?>
            </li>
         <?php endfor; ?>
      </ul>
   </div>
</div>

   <div id="videos" class="columns medium-10 ha large-11 p0 z0">



   </div>


</div>
<?php get_footer(); ?>
