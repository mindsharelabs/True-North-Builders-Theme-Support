<?php

/**
 * Portfolio Gallery
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'north-portfolio-gallery-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'north-portfolio-gallery';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$portfolio_gallery = get_field('portfolio_gallery');


if($portfolio_gallery) :
  echo '<div class="' . $className . ' p-4 mb-5" id="' . $id . '">';

    echo '<div class="row">';
      foreach ($portfolio_gallery['gallery_images'] as $key => $image) :
        echo '<div class="col-6 col-md-4 mb-4">';
          echo '<div class="card">';
            echo '<a href="' . $image['url'] . '" data-lightbox="lightbox-' . $id .'">';
              echo wp_get_attachment_image( $image['id'], 'thumbnail', false, array('class' => 'w-100'));
            echo '</a>';

          echo '</div>';
        echo '</div>';
      endforeach;

    echo '</div>';


  echo '</div>';
endif;
