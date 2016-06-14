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


$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
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
   });
});
