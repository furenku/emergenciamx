$(document).foundation();


var u = new FrontEndUtils();

var lineaTiempoFija = false;

$(document).ready(function(){

   u.vcenter();
   u.shareW();


   setTimeout(function(){
      u.vcenter();
      u.shareW();
   }, 1000 );

   $('.main-scroller').scroll(function(){
      $('#cabecera').animate({opacity:1},500,function() {
         $('#cabecera').removeClass('op0')
      })


      var linea = $('#linea-de-tiempo-fondo');

      if( linea.hasClass('hidden') ) {

         var linea = $('#linea-de-tiempo');

      }

      var posicionLineaDeTiempo = linea.offset().top+$(this).scrollTop() - $('#linea-de-tiempo').height();

      if( $(this).scrollTop() > posicionLineaDeTiempo ) {

         if( ! lineaTiempoFija ) {

            $('#linea-de-tiempo').css({
               position: 'fixed',
               marginTop: $('#cabecera').height(),
               top: 0
            })
            $('#linea-de-tiempo-fondo').removeClass('hidden');
            lineaTiempoFija = true;
         }
      } else {

         if( lineaTiempoFija ) {

            $('#linea-de-tiempo').css({
               position: 'relative',
               marginTop: 0,
               top: 0
            })
            $('#linea-de-tiempo-fondo').addClass('hidden');
            lineaTiempoFija = false;

         }
      }

   })


   var diap = $('.diapositiva.hidden');
   for(var i = 0; i < 13; i++) {
      var index = Math.floor( Math.random() * $('.video').length )
      var img = $('.video').eq(index).find('.imagen img');
      var newdiap = diap.clone();
      newdiap.detach().html(img).removeClass('hidden').appendTo( diap.parent() );
   }

   $('.imgLiquid.imgLiquidFill').imgLiquid();
   $('.imgLiquid.imgLiquidNoFill').imgLiquid({fill:false});

   $('#portada_fondo').slick({
      fade:true,autoplay:true,speed:5000
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

   var botonesAnno = $('.selector-tiempo');

   botonesAnno.click(function(){

      var anno = $(this).data('anno');

      $videos_container.isotope({ filter: '[data-anno='+anno+']' });

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



      $('#linea-de-tiempo-fondo').removeClass('hidden');




      // css({ marginTop: '0 !important' });
      // u.vcenter('nav#menu');
   }
   $('#mostrar_menu').click(function(){

      var fa =$(this).find('.fa');

      if( fa.hasClass('fa-bars') ) {
         $('nav#menu').removeClass('hide-for-small-only');
         fa.removeClass('fa-bars').addClass('fa-close');
         // $('#cabecera').height('100vh');
         $('#linea-de-tiempo').css({
            position: 'relative',
            marginTop: 0,
            top: 0
         })
      } else {
         $('nav#menu').addClass('hide-for-small-only');
         fa.removeClass('fa-close').addClass('fa-bars');
         // $('#cabecera').height('10vh');
         $('#linea-de-tiempo').css({
            position: 'fixed',
            marginTop: $('#cabecera').height(),
            top: 0
         })
      }

   })


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
