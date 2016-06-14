$(document).foundation();



jQuery(function() {
	var nav = jQuery('.navfix');

	var navTop = 200;

	var navHeight = nav.height()+10;
	var showFlag = false;
	nav.css('top', -navHeight+'px');

    var w = $(window).width();
    if ( w > 640 ) { //PCのみ対応
		jQuery(window).scroll(function () {
			var winTop = jQuery(this).scrollTop();
			if (winTop >= navTop) {
				if (showFlag == false) {
					showFlag = true;
					nav
						.addClass('fixed')
						.stop().animate({'top' : '0px'}, 200);
				}
			} else if (winTop <= navTop) {
				if (showFlag) {
					showFlag = false;
					nav.stop().animate({'top' : -navHeight+'px'}, 200, function(){
						nav.removeClass('fixed');
					});
				}
			}
		});
	}

});

jQuery(function () {
  if(jQuery('#navControl a').attr('class') == 'close'){
    jQuery('#globalNav').css('display', 'none');
	jQuery('#globalNav_top').css('display', 'none');
  }
    jQuery('#navControl a').click(function() {
    jQuery('#globalNav').slideToggle();
	 jQuery('#globalNav_top').slideToggle();
    jQuery(this).toggleClass('close');
		return false;
  });
});


var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop && st > 150){
       if( !$('#top_header').hasClass('hidden') ){
         $('#top_header').addClass('hidden');
       }
       $('#top_header').removeClass('shown');
   }
   else if (st <= 150){
     $('#top_header').removeClass('hidden');
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
