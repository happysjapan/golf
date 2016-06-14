$(document).foundation();

var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop && st > 150){
       if( !$('#top_header').hasClass('hidden') ){
         $('#top_header').addClass('hidden');
         $('#top_header').addClass('logo_hidden');
       }
       $('#top_header').removeClass('shown');
   }
   else if (st <= 150){
     $('#top_header').removeClass('hidden');
     $('#top_header').removeClass('logo_hidden');
     $('#top_header').removeClass('shown');
   }
   else {
     if( !$('#top_header').hasClass('shown') ){
       $('#top_header').addClass('shown');
     }
     $('#top_header').removeClass('hidden');
   }
   lastScrollTop = st;
});
