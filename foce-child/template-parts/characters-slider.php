<?php
$args = array(
    'post_type' => 'characters',
    'posts_per_page' => -1,
    'meta_key'  => '_main_char_field',
    'orderby'   => 'meta_value_num',
);
$characters_query = new WP_Query($args);

// Nombre minimum de diapositives souhaité
$min_slides = 5;
?>

<article id="characters" class="slider-characters">
   <h3>Les personnages</h3>
   <!-- Slider main container -->
   <div class="swiper-container">
       <div class="swiper-wrapper">
           <?php
           $slide_count = 0;
           $original_slides = array();

           // Première boucle pour stocker les diapositives originales
           while ($characters_query->have_posts()) {
               $characters_query->the_post();
               ob_start();
               ?>
               <div class="swiper-slide">
                   <figure>
                       <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
                       <figcaption><?php the_title(); ?></figcaption>
                   </figure>
               </div>
               <?php
               $original_slides[] = ob_get_clean();
               $slide_count++;
           }

           // Afficher les diapositives originales
           echo implode('', $original_slides);

           // Dupliquer les diapositives si nécessaire
           while ($slide_count < $min_slides) {
               foreach ($original_slides as $slide) {
                   echo $slide;
                   $slide_count++;
                   if ($slide_count >= $min_slides) break 2;
               }
           }

           // Réinitialise les données de la requête
           wp_reset_postdata();
           ?>
       </div>
   </div>
</article>


