

var u = new FrontEndUtils();


var scrollTimeout = false;

$(document).ready(function(){

   $(document).foundation();


   u.vcenter();
   u.shareW();
   u.shareH();


   setTimeout(function(){

      u.vcenter();
      u.shareW();
      u.shareH();

   }, 1000 );

   $(window).scroll(function(){
      if( ! scrollTimeout ) {

         scrollTimeout = setTimeout(function(){


            if( $(window).scrollTop() > 50 ) {

               if( $('#cabecera').hasClass('op0') || $('#cabecera').css('opacity') == 0 ) {
                  $('#cabecera').animate({opacity:1},500,function() {
                     $('#cabecera').removeClass('op0')
                  })
               }

            } else {

               if( ! $('#cabecera').hasClass('op0') ) {
                  $('#cabecera').animate({opacity:0},500,function() {
                     $('#cabecera').addClass('op0')
                  })
               }

            }

            scrollTimeout = false;

         },150);

      }




   })


   $('#portada .contenido a').each(function(){
      var img = $(this).find('img');
      var diapositiva = $('#portada_fondo .diapositiva.hidden').clone().appendTo('#portada_fondo').removeClass('hidden');
      if( img.length > 0 )
      img.detach().appendTo( diapositiva );
      $(this).remove();
   })

   $('#portada .contenido img').each(function(){

      var diapositiva = $('#portada_fondo .diapositiva.hidden').clone().appendTo('#portada_fondo').removeClass('hidden');

      $(this).detach().appendTo( diapositiva );

   })


   $('.imgLiquid.imgLiquidFill').imgLiquid();
   $('.imgLiquid.imgLiquidNoFill').imgLiquid({fill:false});


   $('#portada_fondo').slick({
      fade:true,autoplay:true,speed:2000, autoplaySpeed:4000
   })


   var $videos_container = $('#videos').isotope({
      masonry: {
         gutterWidth:1
      }
      // layoutMode: 'fitRows',
   });//{columnWidth:100});

   //
   // var $items = getItems();
   // $videos_container.isotopeImagesReveal( $items );



   // fix temporal imgs portada



   // MENU DE AÑOS

   var botonesAnno = $('.selector-anno');

   botonesAnno.click(function(){

      var anno = $(this).data('anno');

      $videos_container.isotope({ filter: '[data-anno='+anno+']' });

   })

   var botonesCategorias = $('.selector-categoria');

   botonesCategorias.click(function(){

      var categoria = $(this).data('categoria');

      $videos_container.isotope({

         filter: function() {

            var cat_ids = $(this).data('categorias');

            var in_array = false;

            return $.inArray( categoria, cat_ids ) > -1 ;

         }
      });

   })

   if( parseInt( $(window).width() ) < 768 ) {

      $('nav#menu').detach().insertAfter('#mostrar_menu');
      var wH = parseInt( $(window).height() ) * 0.9;
      $('nav#menu').height( wH );
      $('nav#menu li').height( wH / $('nav#menu li').length );
      $('nav#menu li').addClass('mt0');
      $('nav#menu li').each(function(){
         var newDiv = $('<div>').addClass('vcenter').html( $(this).html() );
         $(this).html( newDiv );
      })
      u.vcenter('nav#menu li')



      // $('#linea-de-tiempo-fondo').removeClass('hidden');




      // css({ marginTop: '0 !important' });
      // u.vcenter('nav#menu');
   }
   // $('#mostrar_menu').click(function(){
   //
   //    var fa =$(this).find('.fa');
   //
   //    if( fa.hasClass('fa-bars') ) {
   //       $('nav#menu').removeClass('hide-for-small-only');
   //       fa.removeClass('fa-bars').addClass('fa-close');
   //       // $('#cabecera').height('100vh');
   //       $('#linea-de-tiempo').css({
   //          position: 'relative',
   //          marginTop: 0,
   //          top: 0
   //       })
   //    } else {
   //       $('nav#menu').addClass('hide-for-small-only');
   //       fa.removeClass('fa-close').addClass('fa-bars');
   //       // $('#cabecera').height('10vh');
   //       $('#linea-de-tiempo').css({
   //          position: 'fixed',
   //          marginTop: $('#cabecera').height(),
   //          top: 0
   //       })
   //    }
   //
   // })


})





$.fn.isotopeImagesReveal = function( $items ) {
   var iso = this.data('isotope');
   var itemSelector = iso.options.itemSelector;
   // hide by default
   $items.hide();
   // append to container
   this.append( $items );
   $items.imagesLoaded().progress( function( imgLoad, image ) {
      // get item
      // image is imagesLoaded class, not <img>, <img> is image.img
      var $item = $( image.img ).parents( itemSelector );
      // un-hide item
      $item.show();
      // isotope does its thing
      iso.appended( $item );
   });

   return this;
};

function randomInt( min, max ) {
   return Math.floor( Math.random() * max + min );
}

function getItem() {
   var width = randomInt( 150, 400 );
   var height = randomInt( 150, 250 );
   var item = '<div class="item">'+
   '<img src="http://lorempixel.com/' +
   width + '/' + height + '/nature" /></div>';
   return item;
}

function getItems() {
   var items = '';
   for ( var i=0; i < 12; i++ ) {
      items += getItem();
   }
   // return jQuery object
   return $( items );
}
