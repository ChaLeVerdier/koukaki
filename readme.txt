 Section dans le theme parent où ajouter la vidéo :
 
 Fichier front-page : 
  <main id="primary" class="site-main">
        <section class="banner">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?> " alt="logo Fleurs d'oranger & chats errants">
        </section>

function.php : Filemtime 
En utilisant filemtime comme version du fichier, on s'assure que le navigateur recharge toujours la version la plus récente du fichier CSS. Cela évite les problèmes de cache, où les modifications apportées au fichier CSS ne seraient pas immédiatement visibles pour les utilisateurs.


main.css
/* assets/css/custom-style.css */

/* Définir l'animation de fade-in du bas vers le haut */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
        /* Décalage vertical initial */
    }

    to {
        opacity: 1;
        transform: translateY(0);
        /* Position finale */
    }
}

/* Classe pour appliquer l'animation aux éléments */
.fade-in-animation {
    animation: fadeInUp 5s ease-in forwards;
    /* Appliquer l'animation avec une durée de 1 seconde */
}

/* Assurez-vous que les éléments sont invisibles avant l'animation */
.banner,
.story,
.studio {
    /* Initialement cachés et prêts pour l'animation */
}