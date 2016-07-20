$(document).foundation();

$(function(){

  // Responsie images slider
  function setSliderImages(width) {
    if( width < 640 ){
      $('.front_orbit--image').each(function(){
        $(this).css('background-image', 'url('+$(this).attr('data-src-mobile')+')');
      });
    } else {
      $('.front_orbit--image').each(function(){
        $(this).css('background-image', 'url('+$(this).attr('data-src')+')');
      });
    }

  }

  var width = $( window ).width();
  setSliderImages(width);

  $( window ).resize(function() {
    var width = $( window ).width();
    setSliderImages(width);
  });


  // Slider height
  var height = $( window ).height();
  $('#front_orbit').height(height);

  $( window ).resize(function() {
    var height = $( window ).height();
    $('#front_orbit').height(height);
  });

  // Smooth scroll menu
  $('#scroll_top').click(function(){
    var speed = 800;
    $('#js_next').attr('href', '#cast');

    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = (target.offset().top);
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });


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


   // #で始まるアンカーをクリックした場合に処理
   $('a[href^="#"]').click(function() {

     if( !$(this).hasClass('no_anim') ){
       // スクロールの速度
       var speed = 400; // ミリ秒
       // アンカーの値取得
       var href= $(this).attr("href");
       // 移動先を取得
       var target = $(href == "#" || href == "" ? 'html' : href);
       // 移動先を数値で取得
       var position = target.offset().top;
       // スムーススクロール
       $('body,html').animate({scrollTop:position}, speed, 'swing');
       return false;
     }
   });


   $('#user_email').appendTo("#wpcf7-f10-o1 form");
   $('#user_name').appendTo("#wpcf7-f10-o1 form");

});







(function($){

    /**
     * Copyright 2012, Digital Fusion
     * Licensed under the MIT license.
     * http://teamdf.com/jquery-plugins/license/
     *
     * @author Sam Sehnert
     * @desc A small plugin that checks whether elements are within
     *       the user visible viewport of a web browser.
     *       only accounts for vertical position, not horizontal.
     */
    var $w = $(window);
    $.fn.visible = function(partial,hidden,direction){

        if (this.length < 1)
            return;

        var $t        = this.length > 1 ? this.eq(0) : this,
            t         = $t.get(0),
            vpWidth   = $w.width(),
            vpHeight  = $w.height(),
            direction = (direction) ? direction : 'both',
            clientSize = hidden === true ? t.offsetWidth * t.offsetHeight : true;

        if (typeof t.getBoundingClientRect === 'function'){

            // Use this native browser method, if available.
            var rec = t.getBoundingClientRect(),
                tViz = rec.top    >= 0 && rec.top    <  vpHeight,
                bViz = rec.bottom >  0 && rec.bottom <= vpHeight,
                lViz = rec.left   >= 0 && rec.left   <  vpWidth,
                rViz = rec.right  >  0 && rec.right  <= vpWidth,
                vVisible   = partial ? tViz || bViz : tViz && bViz,
                hVisible   = partial ? lViz || rViz : lViz && rViz;

            if(direction === 'both')
                return clientSize && vVisible && hVisible;
            else if(direction === 'vertical')
                return clientSize && vVisible;
            else if(direction === 'horizontal')
                return clientSize && hVisible;
        } else {

            var viewTop         = $w.scrollTop(),
                viewBottom      = viewTop + vpHeight,
                viewLeft        = $w.scrollLeft(),
                viewRight       = viewLeft + vpWidth,
                offset          = $t.offset(),
                _top            = offset.top,
                _bottom         = _top + $t.height(),
                _left           = offset.left,
                _right          = _left + $t.width(),
                compareTop      = partial === true ? _bottom : _top,
                compareBottom   = partial === true ? _top : _bottom,
                compareLeft     = partial === true ? _right : _left,
                compareRight    = partial === true ? _left : _right;

            if(direction === 'both')
                return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop)) && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
            else if(direction === 'vertical')
                return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop));
            else if(direction === 'horizontal')
                return !!clientSize && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
        }
    };

})(jQuery);








// Lazy loading
var lazy = [];
registerListener('load', lazyCheck);
registerListener('scroll', lazyCheck);
registerListener('resize', lazyCheck);

function lazyCheck() {
  $('.lazy').each( function(){
    if( $(this).visible() ){
      $(this).css('background-image', 'url('+$(this).attr('data-src')+')');
      $(this).css('border', '2px solid #fff');
      $(this).removeClass('lazy');
    }
  });
}

function registerListener(event, func) {
    if (window.addEventListener) {
        window.addEventListener(event, func)
    } else {
        window.attachEvent('on' + event, func)
    }
}



/*
** Parallax
*/
jQuery(document).ready(function($){
  $(window).scroll(function(){
    $('.parallax_trigger').each( function(){
      if( $(this).visible() ){
        $('.parallax--image').each(function(){
          $(this).addClass('show')
        });
      }
    });
  });



	//check media query
	var mediaQuery = window.getComputedStyle(document.querySelector('.cd-background-wrapper'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, ""),
		//define store some initial variables
		halfWindowH = $(window).height()*0.5,
		halfWindowW = $(window).width()*0.5,
		//define a max rotation value (X and Y axises)
		maxRotationY = 5,
		maxRotationX = 3,
		aspectRatio;

	//detect if hero <img> has been loaded and evaluate its aspect-ratio
	$('.cd-floating-background').find('img').eq(0).load(function() {
		aspectRatio = $(this).width()/$(this).height();
  		if( mediaQuery == 'web' && $('html').hasClass('preserve-3d') ) initBackground();
	}).each(function() {
		//check if image was previously load - if yes, trigger load event
  		if(this.complete) $(this).load();
	});

	//detect mouse movement
	$('.cd-parallax').on('mousemove', function(event){
		if( mediaQuery == 'web' && $('html').hasClass('preserve-3d') ) {
			window.requestAnimationFrame(function(){
				moveBackground(event);
			});
		}
	});

	//on resize - adjust .cd-background-wrapper and .cd-floating-background dimentions and position
	$(window).on('resize', function(){
		mediaQuery = window.getComputedStyle(document.querySelector('.cd-background-wrapper'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, "");
		if( mediaQuery == 'web' && $('html').hasClass('preserve-3d') ) {
			window.requestAnimationFrame(function(){
				halfWindowH = $(window).height()*0.5,
				halfWindowW = $(window).width()*0.5;
				initBackground();
			});
		} else {
			$('.cd-background-wrapper').attr('style', '');
			$('.cd-floating-background').attr('style', '').removeClass('is-absolute');
		}
	});

	function initBackground() {
		var wrapperHeight = Math.ceil(halfWindowW*2/aspectRatio),
			proportions = ( maxRotationY > maxRotationX ) ? 1.1/(Math.sin(Math.PI / 2 - maxRotationY*Math.PI/180)) : 1.1/(Math.sin(Math.PI / 2 - maxRotationX*Math.PI/180)),
			newImageWidth = Math.ceil(halfWindowW*2*proportions),
			newImageHeight = Math.ceil(newImageWidth/aspectRatio),
			newLeft = halfWindowW - newImageWidth/2,
			newTop = (wrapperHeight - newImageHeight)/2;

		//set dimentions and position of the .cd-background-wrapper
		$('.cd-floating-background').addClass('is-absolute');
	}

	function moveBackground(event) {
		var rotateY = ((-event.pageX+halfWindowW)/halfWindowW)*maxRotationY,
			rotateX = ((event.pageY-halfWindowH)/halfWindowH)*maxRotationX;


		$('.cd-floating-background').css({
			'-moz-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
		    '-webkit-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
			'-ms-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
			'-o-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
			'transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
		});
	}
});

/* 	Detect "transform-style: preserve-3d" support, or update csstransforms3d for IE10 ? #762
	https://github.com/Modernizr/Modernizr/issues/762 */
(function getPerspective(){
  var element = document.createElement('p'),
      html = document.getElementsByTagName('html')[0],
      body = document.getElementsByTagName('body')[0],
      propertys = {
        'webkitTransformStyle':'-webkit-transform-style',
        'MozTransformStyle':'-moz-transform-style',
        'msTransformStyle':'-ms-transform-style',
        'transformStyle':'transform-style'
      };

    body.insertBefore(element, null);

    for (var i in propertys) {
        if (element.style[i] !== undefined) {
            element.style[i] = "preserve-3d";
        }
    }

    var st = window.getComputedStyle(element, null),
        transform = st.getPropertyValue("-webkit-transform-style") ||
                    st.getPropertyValue("-moz-transform-style") ||
                    st.getPropertyValue("-ms-transform-style") ||
                    st.getPropertyValue("transform-style");

    if(transform!=='preserve-3d'){
      $('html').addClass('no-preserve-3d');
    } else {
      $('html').addClass('preserve-3d');
    }
    document.body.removeChild(element);

})();
