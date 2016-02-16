$(document).foundation();


var u = new FrontEndUtils();

var lineaTiempoFija = false;

$(document).ready(function(){

   u.vcenter();
   u.shareW();


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
   $('.imgLiquid.imgLiquidFill').imgLiquid();
   $('.imgLiquid.imgLiquidNoFill').imgLiquid({fill:false});


   $('#portada_fondo').slick({
      fade:true,autoplay:true
   })

   $('#entradas').isotope({
      masonry: {
         gutterWidth:1
      }
      // layoutMode: 'fitRows',
   });//{columnWidth:100});

})
