<?php

/**
 * Circle Image Card
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'north-circle-image-card-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'north-circle-image-card';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$image_cards = get_field('image_cards');

if(count($image_cards) > 0) :
  echo '<div class="' . $className . ' container" id="' . $id . '">';
    echo '<div class="row">';
    foreach($image_cards as $card) :
      echo '<div class="col-12 col-md-6 col-lg-3">';
        echo '<div class="circle-card card mt-3">';
          echo '<div class="card-header rounded-circle">';
            if($card['image']) :
              echo ($card['link'] ? '<a href="' . $card['link']['url'] . '" target="' . $card['link']['target'] . '" title="' . $card['link']['title'] . '">' : '');
                echo wp_get_attachment_image( $card['image']['id'], 'medium', true, array('class' => 'w-100 card-img-top') );
              echo ($card['link'] ?  '</a>' : '');
            endif;
          echo '</div>';
          echo '<div class="card-body">';
            echo ($card['link'] ? '<a href="' . $card['link']['url'] . '" target="' . $card['link']['target'] . '" title="' . $card['link']['title'] . '">' : '');
              echo ($card['title'] ? '<h3>' . $card['title'] . '</h3>' : '');
            echo ($card['link'] ?  '</a>' : '');
          echo '</div>';
          if($card['description']) :
            echo '<div class="card-body description">';
              echo $card['description'];
            echo '</div>';
          endif;
        echo '</div>';
      echo '</div>';
    endforeach;
    echo '</div>';
  echo '</div>';
endif;
