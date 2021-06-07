<?php

/**
 * Property Showcase Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'north-property-showcase-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'north-property-showcase';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$property_showcase = get_field('property_showcase');


if($property_showcase) :
  echo '<div class="' . $className . ' p-4 mb-5" id="' . $id . '">';
    echo '<div class="row">';

      echo '<div class="col-12 col-md-4 order-first ' . ($property_showcase['gallery_location'] == 'right' ? 'order-md-last' : '') . '">';
        echo '<div class="card border-0 d-flex h-100 flex-column bg-white p-3">';
          if($link = $property_showcase['card_info']['button_link']) :
            echo '<a href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">';
          endif;
            echo wp_get_attachment_image( $property_showcase['card_info']['header_image']['id'], 'property-card-header', false, array('class' => 'w-100 card-img-top'));
          if($link['url']) :
            echo '</a>';
          endif;


          echo '<div class="card-body px-0">';
            echo '<h3>' . $property_showcase['card_info']['title'] . '</h3>';
            echo $property_showcase['card_info']['description'];

            if($link = $property_showcase['card_info']['button_link']) :
              echo '<div class="d-grid mt-3">';
                echo '<a href="' . $link['url'] . '" class="btn btn-primary" title="' . $link['title'] . '" target="' . $link['target'] . '">';
                  echo $link['title'] . '<span class="ms-2"><i class="fal fa-long-arrow-right"></i></span>';
                echo '</a>';
              echo '</div>';
            endif;
          echo '</div>';
        echo '</div>';
      echo '</div>';


      if($property_showcase['gallery_images']) :
        echo '<div class="col-12 col-md-8 gallery-images">';
          echo '<div class="row bg-white py-3 h-100 justify-content-start">';
          foreach ($property_showcase['gallery_images'] as $key => $image) :
            echo '<div class="col-4 mb-4 gallery-image align-self-start">';
              echo '<a href="' . $image['url'] . '" data-lightbox="lightbox-' . $id .'">';
                echo wp_get_attachment_image( $image['id'], 'thumbnail', false, array('class' => 'w-100'));
              echo '</a>';
            echo '</div>';
          endforeach;
          echo '</div>';
        echo '</div>';
      endif;


    echo '</div>';
  echo '</div>';
endif;
