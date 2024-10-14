// jQuery(document).ready(function($) {
//      $('#test-button').click(function() {
//          alert('Le bouton a été cliqué !');
//      });
//  });
 
 // CLOUDS - Mouvement des nuages au scroll avec jQuery
jQuery(document).ready(function ($) {
     let lastScrollTop = 0;
     const distance = 300; // Distance à déplacer en pixels
   
     $(window).on("scroll", function () {
       let currentScrollTop = $(this).scrollTop();
   
       if (currentScrollTop > lastScrollTop) {
         // Scroll vers le bas
         $(".big_cloud").stop().css("transform", `translateX(-${distance}px)`); // Déplace le nuage de 300px vers la gauche lorsque l'utilisateur fait défiler vers le bas.
         $(".little_cloud").stop().css("transform", `translateX(-${distance}px)`); // Ramène le nuage à sa position initiale lorsque l'utilisateur fait défiler vers le haut.
       } else {
         // Scroll vers le haut
         $(".big_cloud").stop().css("transform", "translateX(0px)");
         $(".little_cloud").stop().css("transform", "translateX(0px)");
       }
   
       lastScrollTop = currentScrollTop;
     });
   });
   