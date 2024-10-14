<?php
// Enregistrer et charger les styles et scripts du thème parent et enfant
function my_theme_enqueue_styles()
{
    // Charger le style du thème parent
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Charger le style du thème enfant après celui du parent
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/assets/css/main.css',
        array('parent-style') // Assure que le style enfant se charge après le parent
    );

    // Charger le script principal du thème enfant
    wp_enqueue_script(
        'child-js',
        get_stylesheet_directory_uri() . '/js/main.js',
        array('jquery'), // Dépendance à jQuery
        wp_get_theme()->get('Version'),
        true // Charger le script en bas de page
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


// Test jQuery
function enqueue_custom_scripts() {
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/jQuery-script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');



// Enregistrer le menu principal et activer le support pour les images en vedette
function my_theme_setup()
{
    add_theme_support('post-thumbnails'); // Permet d'utiliser des images en vedette
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'textdomain'),
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

// Charger Swiper pour les sliders (si utilisé)
function enqueue_swiper_assets()
{
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('custom-swiper-init', get_stylesheet_directory_uri() . '/js/custom-swiper-init.js', array('swiper-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');

// Transférer les options du Customizer depuis le thème parent (si utilisé)
if (get_stylesheet() !== get_template()) {
    add_filter('pre_update_option_theme_mods_' . get_stylesheet(), function ($value, $old_value) {
        // Transférer les modifications du Customizer au thème parent
        update_option('theme_mods_' . get_template(), $value);
        return $old_value; // Empêcher la mise à jour des options du thème enfant
    }, 10, 2);

    add_filter('pre_option_theme_mods_' . get_stylesheet(), function ($default) {
        // Récupérer les options du Customizer du thème parent
        return get_option('theme_mods_' . get_template(), $default);
    });
}
