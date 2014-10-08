$(document).ready(main);

function main(){
  var lol = $('.slide').height() + $('#container').height() +10;
	  $(window).scroll(function() {
        if ($(window).scrollTop() >= $(".slide").height()) {   //AQUI VA EL ALTO DE LA IMAGEN
        	$('.navbar').css({'z-index':'15000', 'position':'fixed','top':'0px', 'width':'100%'});
        } else {
          $('.navbar').css({'z-index':'100','position':'relative','top':'auto'});          
        }
      });

    $(window).scroll(function() {
        if ($(window).scrollTop() >= $(".slide").height()  && $(window).scrollTop() <= $("#container").height() && $(window).scrollTop() <= ($("#container").height()+$(".slide").height()) ) {   //AQUI VA EL ALTO DE LA IMAGEN 
          $('.fixbus').css({'z-index':'100', 'position':'fixed','top':$('.navbar').height(),'width':$('.col-sm-4').width(), 'margin-top':'1em'});
        } else {
          $('.fixbus').css({'position':'relative','top':'-1em', 'width':'100%'});
        }
      });
}