<?php

/**
 * Simple Timeline
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'north-social-icons-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'north-social-icons';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$social_media_icons = get_field('social_media_icons');

if($social_media_icons) :

$icons = ($social_media_icons['icons_from_settings'] ? get_field('social_media_icons', 'options') : $social_media_icons['icons']);

echo '<div class="' . $className . '" id="' . $id . '">';
  echo '<div class="d-flex flex-wrap">';
    foreach ($icons as $key => $icon) :
      echo '<a class="d-block me-2" href="' . $icon['link']['url'] . '" target="' . $icon['link']['target'] . '" title="' . $icon['link']['title'] . '"><i class="fa-' . $social_media_icons['icon_size'] . ' ' . $icon['icon'] . '"></i></a>';
    endforeach;
  echo '</div>';

echo '</div>';

endif;
