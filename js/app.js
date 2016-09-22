

var u = new FrontEndUtils();


var scrollTimeout = false;
var resizeTimeout = false;

$(document).ready(function(){

   $('#loading img').fadeOut(400,function(){
      $('#loading').fadeOut(400,function(){
         $('#loading').remove();
      })
   });



   $(document).foundation();




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
   $('.imgLiquid.imgLiquidNoFill').imgLiquid({ fill: false });


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

   setup_botones_categorias( botonesCategorias );

   function setup_botones_categorias( botones ) {


      botones.click(function(){

         var categorias = [];

         var categoria = $(this).data('categoria');

         categorias.push( categoria );

         var sub_categorias = $(this).find('li.selector-categoria')
         sub_categorias.each(function(i,e){
            categorias.push( $(e).data('categoria') );
         })

         if( sub_categorias.length > 1 ) {

            $('#barra-categorias > .selector-categoria').addClass('hidden');

            var tmp = sub_categorias.clone().detach()
            .prependTo('#barra-categorias')
            .addClass('tmp')
            .css('opacity',0).removeClass('hidden');

            regresar = $('<li>').addClass('button shareW fontM h_10vh p0 button secondary')
            regresar.html('<div class="vcenter"><span class="fa fa-angle-left"></span>Regresar</div>')
            regresar.prependTo('#barra-categorias')

            u.shareW('#barra-categorias .tmp');
            u.vcenter('#barra-categorias .vcenter');

            setup_botones_categorias( tmp );

            tmp.css('opacity',1);

            regresar.click(function(){
               $('#barra-categorias .tmp').remove();
               regresar.remove();
               $('#barra-categorias  > li').removeClass('hidden');
               u.vcenter('#barra-categorias .vcenter');
            })
         }


         $videos_container.isotope({
            filter: function() {
               var cat_ids = $(this).data('categorias');
               var in_array = false;
               for(i in categorias) {
                  if( $.inArray( categorias[i], cat_ids ) > -1 ) {
                     in_array = true;
                     break;
                  }
               }
               return in_array;
            }
         });

         $('html,body').animate({
            scrollTop: $('#portada').height() - $('#barra-categorias').height()
         }, 400 );


      })
   }

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

   $(window).resize(function(){
      if( ! resizeTimeout ) {
         resizeTimeout = setTimeout(function(){

            u.shareW();
            u.shareH();
            u.vcenter();

            resizeTimeout = false;

         },150);
      }
   })

   $(window).trigger('resize');

   $('html,body').css({height:'auto',overflowY:'auto'});

   $('html,body').scrollTop(0);


   var bLazy = new Blazy({
      success: function(img) {
         jimg = $(img);
         if(jimg.parent().hasClass('imagen') ){
            jimg.parent().addClass('imgLiquid imgLiquidFill')
            jimg.parent().removeClass('op0')
            jimg.parent().imgLiquid();
         }
      }
   });


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
