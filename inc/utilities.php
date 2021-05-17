<?php
if (function_exists('add_theme_support')) {
  add_image_size( 'medium-square', 450, 450, array('center', 'center'));
}

add_action('init', 'north_create_post_type'); // Add our mind Blank Custom Post Type
function north_create_post_type() {
  register_post_type('technology',array(
    'labels' => array(
      'name' => __('Tech Area', 'mindblank'), // Rename these to suit
      'singular_name' => __('Tech Area', 'mindblank'),
      'add_new' => __('Add New Tech Area', 'mindblank'),
      'add_new_item' => __('Add New Tech Area', 'mindblank'),
      'edit' => __('Edit Tech Area', 'mindblank'),
      'edit_item' => __('Edit Tech Area', 'mindblank'),
      'new_item' => __('New Tech Area', 'mindblank'),
      'view' => __('View Tech Area', 'mindblank'),
      'view_item' => __('View Tech Area', 'mindblank'),
      'search_items' => __('Search Tech Areas', 'mindblank'),
      'not_found' => __('No Tech Areas found', 'mindblank'),
      'not_found_in_trash' => __('No Tech Areas found in Trash', 'mindblank')
    ),
    'public' => true,
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => 'technology',
    'show_in_rest' => true,
    'supports' => array(
      'title',
      'editor',
    ), // Go to Dashboard Custom mind Blank post for supports
    'can_export' => true, // Allows export in Tools > Export
  ));



  register_post_type('team',array(
    'labels' => array(
      'name' => __('The Team', 'mindblank'), // Rename these to suit
      'singular_name' => __('Team Member', 'mindblank'),
      'add_new' => __('Add New Team Member', 'mindblank'),
      'add_new_item' => __('Add New Team Member', 'mindblank'),
      'edit' => __('Edit Team Member', 'mindblank'),
      'edit_item' => __('Edit Team Member', 'mindblank'),
      'new_item' => __('New Team Member', 'mindblank'),
      'view' => __('View Team Member', 'mindblank'),
      'view_item' => __('View Team Member', 'mindblank'),
      'search_items' => __('Search Team Members', 'mindblank'),
      'not_found' => __('No Team Members found', 'mindblank'),
      'not_found_in_trash' => __('No Team Members found in Trash', 'mindblank')
    ),
    'public' => true,
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => 'team',
    // 'show_in_rest' => true,
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
    ), // Go to Dashboard Custom mind Blank post for supports
    'can_export' => true, // Allows export in Tools > Export
  ));


}



// Register Custom Taxonomy
add_action( 'init', 'north_custom_taxonomy', 0 );
function north_custom_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Team Sections', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Team Section', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Team Section', 'text_domain' ),
		'all_items'                  => __( 'Team Sections', 'text_domain' ),
		'parent_item'                => __( 'Parent Section', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Section:', 'text_domain' ),
		'new_item_name'              => __( 'New Section Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Section', 'text_domain' ),
		'edit_item'                  => __( 'Edit Section', 'text_domain' ),
		'update_item'                => __( 'Update Section', 'text_domain' ),
		'view_item'                  => __( 'View Section', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate sections with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove sections', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Sections', 'text_domain' ),
		'search_items'               => __( 'Search Sections', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Sections', 'text_domain' ),
		'items_list'                 => __( 'Sections list', 'text_domain' ),
		'items_list_navigation'      => __( 'Sections list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'team_section', array( 'team' ), $args );

}




add_filter('template_include', 'north_template_include');
function north_template_include( $template ) {
  if ( is_post_type_archive('team') ) :
    $theme_files = array('archive-team.php', 'inc/templates/archive-team.php');
    $exists_in_theme = locate_template($theme_files, false);
    if ( $exists_in_theme != '' ) :
      return $exists_in_theme;
    else :
      return NORTH_ABSPATH . 'inc/templates/archive-team.php';
    endif;
  elseif( is_singular('team')) :
    $theme_files = array('single-team.php', 'inc/templates/single-team.php');
    $exists_in_theme = locate_template($theme_files, false);
    if ( $exists_in_theme != '' ) :
      return $exists_in_theme;
    else :
      return NORTH_ABSPATH . 'inc/templates/single-team.php';
    endif;
  endif;
  return $template;
}
