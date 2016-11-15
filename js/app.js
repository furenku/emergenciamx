

var u = new FrontEndUtils();
var $videos_container;

var scrollTimeout = false;
var resizeTimeout = false;

var categorias;

$(document).ready(function(){

   $('#loading img').fadeOut(400,function(){
      $('#loading').fadeOut(400,function(){
         $('#loading').remove();
      })
   });


   $(document).foundation();





   // $(window).scroll(function(){
   //
   //    if( ! scrollTimeout ) {
   //
   //       scrollTimeout = setTimeout(function(){
   //
   //
   //          if( $(window).scrollTop() > 50 ) {
   //
   //             if( $('#cabecera').hasClass('op0') || $('#cabecera').css('opacity') == 0 ) {
   //                $('#cabecera').animate({opacity:1},500,function() {
   //                   $('#cabecera').removeClass('op0')
   //                })
   //             }
   //
   //          } else {
   //
   //             if( ! $('#cabecera').hasClass('op0') ) {
   //                $('#cabecera').animate({opacity:0},500,function() {
   //                   $('#cabecera').addClass('op0')
   //                })
   //             }
   //
   //          }
   //
   //          scrollTimeout = false;
   //
   //       },150);
   //
   //    }
   //
   // });


   $('#portada .contenido a').each(function(){
      var img = $(this).find('img');

      if( img.length > 0 ) {
         var diapositiva = $('#portada_fondo .diapositiva.hidden').clone().appendTo('#portada_fondo').removeClass('hidden');
         img.detach().appendTo( diapositiva );
      }
      $(this).remove();
   })

   $('#portada .contenido img').each(function(){

      var diapositiva = $('#portada_fondo .diapositiva.hidden').clone().appendTo('#portada_fondo').removeClass('hidden');

      $(this).detach().appendTo( diapositiva );

   })


   $('.imgLiquid.imgLiquidFill').imgLiquid();
   $('.imgLiquid.imgLiquidNoFill').imgLiquid({ fill: false });


   $('#portada_fondo').slick({
      fade:false,autoplay:true,speed:400, autoplaySpeed:4000
   })


   // $videos_container = $('#videos').isotope({
   //    masonry: {
   //       gutterWidth:1
   //    }
   //
   // });


   // MENU DE AÑOS

   var botonesAnno = $('.selector-anno');

   botonesAnno.click(function(){

      var anno = $(this).data('anno');
      $('#videos .video').css({display:'none'})
      $('#videos').isotope({ filter: '[data-anno='+anno+']' });

   })

   var botonesCategorias = $('.selector-categoria');

   setup_botones_categorias( botonesCategorias );

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





   }



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

   // $('html,body').css({height:'auto',overflowY:'auto'});
   //
   // $('html,body').scrollTop(0);




   dynamic_load_videos();

   blazy();

});




function blazy() {

   var bLazy = new Blazy({
      container: '#videos',

      success: function(img) {
         jimg = $(img);

         if(jimg.parent().hasClass('imagen') ){
            jimg.parent().addClass('imgLiquid imgLiquidFill')
            jimg.parent().removeClass('op0')
            jimg.parent().imgLiquid();
         }
      }
   });
}

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







var nextPageToLoad = 0;
var videosHTML = "";
function dynamic_load_videos() {

   $.ajax({
      url: emmx_ajax.ajaxurl,
      dataType: 'json',
      data: {
         action : 'dynamic_load_videos',
         pageToLoad: nextPageToLoad,
         nonce: emmx_ajax.get_videos_nonce
      },
      success: function( response ) {

         // $('#videos').append( response.html );
         videosHTML += response.html;


         // $('#videos').isotope();


         nextPageToLoad++;

         $('.cargando').html( Math.round(response.total) );
         $('#cargando-barra').animate({width: $(window).width() * ( response.total * 0.01 ) },300);

         if( response.stop == false ){

            dynamic_load_videos();

         } else {

            $('#cargando-contenedor').fadeOut(300,function() {

               $('#videos').html( videosHTML );

               $videos_container = $('#videos').isotope({
                  layoutMode: 'packery',
                  filter: '*'
               });
               $videos_container.on( 'arrangeComplete', function( event, filteredItems ) {
                  blazy();


                  $('html,body').animate({
                     scrollTop: $('#portada').height() - $('#barra-categorias').height() + Math.ceil( Math.random() * 3)
                  }, 10);
               });

               u.vcenter();
               blazy();

               $('#cargando-contenedor').remove();

            });

         }

         $(window).trigger('resize');

      }
   });

}




var boton_categoria;

function setup_botones_categorias( botones ) {

   boton_categoria = $(this);

   botones.click(function(){

      categorias = [];


      boton_categoria = $(this);
      var categoria = $(this).data('categoria');

      categorias.push( categoria );

      var sub_categorias = $(this).find('li.selector-categoria');

      sub_categorias.each(function(i,e){
         categorias.push( $(e).data('categoria') );
      })

      if( sub_categorias.length > 1 ) {

         $('#barra-categorias > .selector-categoria').addClass('hidden');

         var tmp = sub_categorias.clone().detach()
         .prependTo('#barra-categorias')
         .addClass('tmp')
         .css('opacity',0).removeClass('hidden');


         categoria_superior = boton_categoria.clone()
         .prependTo('#barra-categorias')
         .addClass('tmp button secondary')
         .css('opacity',0).removeClass('hidden');

         tmp = tmp.add( categoria_superior)

         if( $("#barra-categorias .regresar").length == 0 ) {

            regresar = $('<li>').addClass('shareW fontM h_10vh p0 button secondary tmp regresar')
            regresar.html('<div class="vcenter"><span class="fa fa-angle-left pr1"></span>Regresar</div>')
            regresar.prependTo('#barra-categorias')

         }

         setup_botones_categorias( tmp );

         tmp.css('opacity',1);

         setTimeout(function(){
            // u.shareW('#barra-categorias .tmp');
            $('#barra-categorias .tmp').width( ( $("#barra-categorias").innerWidth() - 12 ) / ( $('#barra-categorias .tmp').length ) );
            $('#barra-categorias .tmp').css({ float: 'left', display: 'inline-block', boxSizing: 'border-box' });
            u.vcenter();//'#barra-categorias .vcenter');
         }, 100 );

         regresar.click(function(){
            $('#barra-categorias .tmp').remove();
            regresar.remove();
            $('#barra-categorias  > li').removeClass('hidden');
            u.vcenter('#barra-categorias .vcenter');

            u.shareW('#barra-categorias > li');
            $('#videos').isotope({
               filter: '*',
               layoutMode: 'packery',
            });

         })

      }

      // $('#videos .video').hide();
      setTimeout(function(){

         $('#videos').isotope({
            onLayout: function() {
               $(window).trigger("scroll");
            },
            layoutMode: 'packery',
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

         // $('#videos .video').show();
      },500);




   })
}



function masonry() {






}
