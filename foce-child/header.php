<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Utilisation de la librairie jQuery -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  -->
  <!-- + ajouer un defer ou async si en haut du doc -->
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'foce'); ?></a>

    <header id="masthead" class="site-header">

      <nav id="site-navigation" class="main-navigation">
        <!-- Conteneur du titre et du menu burger -->
        <div id="nav-container" class="nav-container">
          <!-- Titre du site -->
          <ul id="site-title" class="site-title">
            <li><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></li>
          </ul>

          <!-- Menu burger -->
          <button id="burger" class="menu-burger toggle-burger" aria-controls="primary-menu" aria-expanded="false">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
          </button>
        </div>
      </nav>

      <!-- Modal -->
      <div id="modal" class="modal">
        <div class="modal__content">
          <!-- Images animées -->
          <img class="koukaki_logo" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo-burger.png'; ?>" alt="Studio Koukaki">
          <img class="Orenjiiro float" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Orenjiiro.png'; ?>" alt="Orenjiiro, chat orange">

          <!-- Menu du modal avec classes supplémentaires -->
          <nav class="modal__menu">
            <ul>
              <li class="modal__content--story flower cat"><a href="#story">Histoire</a></li>
              <li class="modal__content--characters flower cat"><a href="#characters">Personnages</a></li>
              <li class="modal__content--place flower cat"><a href="#place">Lieu</a></li>
              <li class="modal__content--studio flower cat"><a href="#studio">Studio Koukaki</a>
              </li>
            </ul>
          </nav>

          <div class="modal__footer modal-trigger flower cat">
            <a href="#" class="modal__footer-link">STUDIO KOUKAKI</a>
          </div>
        </div>
      </div>
    </header><!-- #masthead -->