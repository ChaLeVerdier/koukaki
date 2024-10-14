// $(document).ready(function(){
//   $(".site-main").click(function(){
//     $(this).hide();
//   });
// });

// Fade-in des sections et banner
document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".container");
  const banner = document.querySelector(".banner");
  const sections = document.querySelectorAll(".section");
  const directions = ["fade-in-down", "fade-in-up", "fade-in-up", "fade-in-up"];
  let ticking = false;

  window.addEventListener("load", function () {
    window.scrollTo(0, 0);
  });

  if (!container || !banner || sections.length === 0) {
    console.error("Éléments nécessaires non trouvés");
    return;
  }

  // Ajouter l'animation à la bannière dès le chargement de la page
  banner.classList.add("fade-in-down");
  container.classList.add("visible");

  // Ajouter les animations aux sections avec un délai progressif
  sections.forEach((section, index) => {
    const directionClass = directions[index % directions.length];
    section.style.setProperty("--section-index", index);
    setTimeout(() => {
      section.classList.add(directionClass, "fade-in");
    }, 300 * index); // Ajustez le délai ici pour un effet en cascade
  });
  // });

  // Observateur pour les sections et la bannière
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          if (entry.target.classList.contains("section")) {
            const index = [...sections].indexOf(entry.target);
            const directionClass = directions[index % directions.length];
            entry.target.classList.add(directionClass, "fade-in");
          } else if (entry.target === banner) {
            container.classList.add("visible");
          }
          observer.unobserve(entry.target);
        } else if (entry.target === banner) {
          container.classList.remove("visible");
        }
      });
    },
    { threshold: 0.2 }
  );

  // Observer les sections
  sections.forEach((section, index) => {
    section.style.setProperty("--section-index", index);
    observer.observe(section);
  });

  // Observer la bannière
  observer.observe(banner);

  // Effet de fade-in down pour la bannière
  banner.classList.add("fade-in-down");

  // Effet parallaxe du logo
  function parallaxEffect() {
    const scrollY = window.scrollY;
    const bannerHeight = banner.offsetHeight;
    const logoHeight = container.offsetHeight;
    const maxTranslateY = bannerHeight - logoHeight;
    const parallaxSpeed = 0.3;

    let translateY = Math.min(scrollY * parallaxSpeed, maxTranslateY);

    container.style.transform = `translateY(${translateY}px)`;
    container.classList.toggle("rebound", translateY >= maxTranslateY);

    if (scrollY === 0) {
      container.style.transition = "transform 0.5s ease-out";
      container.style.transform = "translateY(0)";
    }
  }

  // Gestion de défilement pour les effets parallaxes
  function onScroll() {
    if (!ticking) {
      requestAnimationFrame(() => {
        parallaxEffect();
        ticking = false;
      });
      ticking = true;
    }
  }

  // Initialiser le défilement pour les effets parallaxes
  window.addEventListener("scroll", onScroll, { passive: true });
});

// TITRES H2 H3 : Animation au scroll
document.addEventListener("DOMContentLoaded", ()=> {
  const headings = document.querySelectorAll("h2, h3");

  // Envelopper tous les h2 et h3 dans un span
  headings.forEach((heading) => {
    const text = heading.textContent;
    heading.innerHTML = `<span class="reveal-text">${text}</span>`;
  });

  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const span = entry.target.querySelector(".reveal-text");
          if (span) {
            span.style.animation = "revealTextFromBottom 2s ease forwards";
          }
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.1 }
  );

  headings.forEach((heading) => observer.observe(heading));
});

// CLOUDS - Mouvement des nuages au scroll avec jQuery
// jQuery(document).ready(function ($) {
//   let lastScrollTop = 0;
//   const distance = 300; // Distance à déplacer en pixels

//   $(window).on("scroll", function () {
//     let currentScrollTop = $(this).scrollTop();

//     if (currentScrollTop > lastScrollTop) {
//       // Scroll vers le bas
//       $(".big_cloud").stop().css("transform", `translateX(-${distance}px)`); // Déplace le nuage de 300px vers la gauche lorsque l'utilisateur fait défiler vers le bas.
//       $(".little_cloud").stop().css("transform", `translateX(-${distance}px)`); // Ramène le nuage à sa position initiale lorsque l'utilisateur fait défiler vers le haut.
//     } else {
//       // Scroll vers le haut
//       $(".big_cloud").stop().css("transform", "translateX(0px)");
//       $(".little_cloud").stop().css("transform", "translateX(0px)");
//     }

//     lastScrollTop = currentScrollTop;
//   });
// });


// BURGER
document.addEventListener('DOMContentLoaded', () => {
  const burgerButton = document.querySelector('.toggle-burger');
  const modal = document.querySelector('.modal');
  const modalContent = document.querySelector('.modal__content');

  function toggleModal() {
    modal.classList.toggle('open');
    modalContent.classList.toggle('open');
    burgerButton.classList.toggle('active');
  }

  burgerButton.addEventListener('click', toggleModal);

  modal.addEventListener('click', function(event) {
    if (event.target === modal) {
      toggleModal();
    }
  });
});

// // Animation de la modal 
// document.addEventListener('DOMContentLoaded', () => {
//   const modal = document.getElementById('modal');
//   const openModalButton = document.getElementById('burger'); // ou tout autre élément déclencheur
//   const closeModalButton = document.querySelector('.modal__footer-link'); // ou tout autre élément de fermeture

//   // Fonction pour ouvrir la modal
//   function openModal() {
//     modal.classList.add('open');

//     // Exemple d'ajout de classes pour les animations
//     document.querySelectorAll('.modal__content img').forEach(img => {
//       img.classList.add('animate');
//     });
//   }

//   // Fonction pour fermer la modal
//   function closeModal() {
//     modal.classList.remove('open');

//     // Exemple de suppression des classes d'animation
//     document.querySelectorAll('.modal__content img').forEach(img => {
//       img.classList.remove('animate');
//     });
//   }

//   // Ajouter les écouteurs d'événements
//   openModalButton.addEventListener('click', openModal);
//   closeModalButton.addEventListener('click', closeModal);

//   // Fermer la modal en cliquant en dehors
//   modal.addEventListener('click', (e) => {
//     if (e.target === modal) {
//       closeModal();
//     }
//   });
// });
