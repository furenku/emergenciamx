<?php get_header(); ?>


<?php if( is_front_page() ) : ?>
<div id="barra-annos" class="columns medium-2 large-1 end h_75vh hide-for-small-only pt2 color_blanco color_negro_bg" data-sticky-container>
   <div class="sticky columns p0 h_75vh" data-sticky data-anchor="header-videos" data-margin-top="8">
      <ul class="h_100 mt3">
         <?php for ($i=0; $i < 7; $i++) : ?>
            <li class="shareH selector-anno button color_negro_bg" data-anno="<?php echo $i<6 ? 2011+$i : ''; ?>">
               <div class="vcenter ha">
                  <?php echo $i < 6 ? 2011 + $i : "Más"; ?>
               </div>
            </li>
         <?php endfor; ?>
      </ul>
   </div>
</div>

<div id="videos" class="columns medium-10 h-a large-11 p0 z0">



</div>


<?php endif; ?>


</div> <!-- #header-videos -->

<?php get_footer(); ?>
