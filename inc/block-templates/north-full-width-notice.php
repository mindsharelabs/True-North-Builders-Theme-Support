<?php

/**
 * Full Width Notice
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'north-full-width-notice-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'north-full-width-notice';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$notice_text = get_field('notice_text');
$optional_link = get_field('optional_link');

if($notice_text) :
  echo '<div class="' . $className . '" id="' . $id . '">';
    echo '<div class="container">';
      echo '<div class="row">';
        echo '<div class="col-12 d-flex">';
          if($optional_link) :
            echo '<a class="d-block w-100 d-flex  flex-column flex-md-row justify-content-between" href="' . $optional_link['url'] . '" target="' . $optional_link['target'] . '" title="' . $optional_link['title'] . '">';
          endif;

            echo '<span class="notice-text d-block">' . $notice_text . '</span>';

          if($optional_link) :
            echo '<span class="d-block my-auto">' . $optional_link['title'] . ' <i class="ms-4 fal fa-arrow-right"></i>';
            echo '</a>';

          endif;
        echo '</div>';
      echo '</div>';
    echo '</div>';
  echo '</div>';
endif;
