<?php

get_header();
?>

<main id="primary" class="site-main">

<!-- <button id="test-button">Cliquez-moi</button> -->
<!-- Test fonctinnement jQuery -->

    <!-- SECTION banner -->
    <section class="banner">
        <div class="banner-video">
            <!-- Image de fallback -->
            <img class="banner-fallback" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/fallback-image.jpg" alt="Fallback image" preload="auto">
            <!-- Vidéo en arrière-plan -->
            <video autoplay muted loop playsinline poster="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/video-poster.jpg" id="banner-video">
                <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/videos/video-studio.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container">
            <img class="banner-title" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo Fleurs d'oranger & chats errants">
        </div>
    </section>



    <!-- SECTION story -->
    <section id="#story" class="section story">
        <h2>L'histoire</h2>
        <article id="" class="story__article">
            <p><?php echo get_theme_mod('story'); ?></p>
        </article>

        <!-- Suppression du template for swipper : déplacé vers characteres.php -->
        <?php
            // Inclure le template part
            $template_part = 'template-parts/characters-slider'; // Chemin relatif sans extension


            if (locate_template($template_part . '.php')) {
                get_template_part($template_part);
            } else {
                echo '<p>Le fichier characters-slider.php n\'a pas été trouvé dans les template-parts.</p>';
            }
            ?>


            <!-- Article place -->
            <article id="place">
                <div>
                    <h3>Le Lieu</h3>
                    <p><?php echo get_theme_mod('place'); ?></p>
                </div>
                <!-- Ajout d'un conteneur séparé pour les nuages -->
                <div class="clouds_container">
                    <div class="clouds">
                        <div class="big_cloud"></div>
                        <div class="little_cloud"></div>
                    </div>
                </div>

            </article>
    </section>

    <!-- SECTION Studio -->
    <section id="studio" class="section studio">
        <h2>Studio Koukaki</h2>
        <div>
            <p>Acteur majeur de l’animation, Koukaki est un studio intégré fondé en 2012 qui créé, produit et distribue des programmes originaux dans plus de 190 pays pour les enfants et les adultes. Nous avons deux sections en activité : le long métrage et le court métrage. Nous développons des films fantastiques, principalement autour de la culture de notre pays natal, le Japon.</p>
            <p>Avec une créativité et une capacité d’innovation mondialement reconnues, une expertise éditoriale et commerciale à la pointe de son industrie, le Studio Koukaki se positionne comme un acteur incontournable dans un marché en forte croissance. Koukaki construit chaque année de véritables succès et capitalise sur de puissantes marques historiques. Cette année, il vous présente “Fleurs d’oranger et chats errants”.</p>
        </div>
    </section>

    <!-- SECTION Oscars -->
    < <?php
        // Inclure le template part Oscars
        $template_part = 'template-parts/oscars';

        if (locate_template($template_part . '.php')) {
            get_template_part($template_part);
        } else {
            echo '<p>Le fichier oscars.php n\'a pas été trouvé dans les template-parts.</p>';
        }
        ?>


        </main><!-- #main -->

        <?php
        get_footer();
