<?php

/**
 * Horizontal Icon Blocks
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'north-icon-blocks-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'north-icon-blocks';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$horizontal_icon_blocks = get_field('horizontal_icon_blocks');


if($horizontal_icon_blocks['blocks']) :
  echo '<div class="' . $className . '" id="' . $id . '">';
    echo '<div class="row">';
      foreach ($horizontal_icon_blocks['blocks'] as $key => $i_block) :
        echo '<div class="col-12 col-md-6 my-1 icon-block">';
          echo '<span class="bg-primary p-3 block-icon text-white"><i class="fa-2x ' . $i_block['icon'] . '"></i></span>';
            if($i_block['link']) :
              echo '<a class="block-label text-primary h-100" href="' . $i_block['link']['url'] . '" target="' . $i_block['link']['target'] . '" title="' . $i_block['link']['title'] . '">';
            endif;
            echo '<span class="bg-light block-label my-auto py-1 px-3  h-100">' . $i_block['label'] . '</span>';
            if($i_block['link']) :
              echo '</a>';
            endif;
        echo '</div>';
      endforeach;

    echo '</div>';
  echo '</div>';
endif;
