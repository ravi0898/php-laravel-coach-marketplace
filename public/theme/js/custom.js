// ========= Sticky Header =========


$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('header').addClass("sticky");
      }
      else{
        $('header').removeClass("sticky");
      }
    });
    
      // ======= Menu Toggle Js ========
    
    $(document).ready(function(){
      $(".hamburger").click(function(){
          $(this).toggleClass("is-active");
          $(".head-nav").toggleClass("active");
      });
    });