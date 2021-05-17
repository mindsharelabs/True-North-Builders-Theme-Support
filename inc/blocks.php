<?php
/**
* Register custom Gutenberg blocks category
*
*/
add_filter('block_categories', function ($categories, $post) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' 	=> 'north-blocks',
				'title' => __('NM Leep Blocks', 'mindshare'),
				'icon' 	=> file_get_contents(NORTH_URL . 'inc/img/mind-icon.svg'),
			),

		)
	);
}, 10, 2);



add_action( 'setup_theme', function() {

}, 10, 1 );



add_action('acf/init', function () {


	// Check function exists.
	if( function_exists('acf_register_block_type') ) {

		acf_register_block_type(array(
			'name'              => 'north-circle-image-card',
			'title'             => __('Circle Image Card'),
			'description'       => __('A block that displays a simple card with a circled featured image.'),
			'render_template'   => NORTH_ABSPATH . '/inc/block-templates/north-circle-image-card.php',
			'category'          => 'north-blocks',
			'icon'              => file_get_contents(NORTH_URL . 'inc/img/mind-icon.svg'),
			'keywords'          => array( 'cards', 'circle', 'repeater', 'image', 'leep', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'block-styles', NORTH_URL . '/inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('block-styles');});

				},
			)
		);
		acf_register_block_type(array(
			'name'              => 'north-social-icons',
			'title'             => __('Social Media Icons'),
			'description'       => __('A block that displays socila media icons configured in Site Settings.'),
			'render_template'   => NORTH_ABSPATH . '/inc/block-templates/north-social-icons.php',
			'category'          => 'north-blocks',
			'icon'              => file_get_contents(NORTH_URL . 'inc/img/mind-icon.svg'),
			'keywords'          => array( 'social', 'media', 'icons', 'leep', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'block-styles', NORTH_URL . '/inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('block-styles');});

				},
			)
		);


		acf_register_block_type(array(
			'name'              => 'north-full-width-notice',
			'title'             => __('Full Width Notice'),
			'description'       => __('A block that displays a notice and optional arrow link to a page.'),
			'render_template'   => NORTH_ABSPATH . '/inc/block-templates/north-full-width-notice.php',
			'category'          => 'north-blocks',
			'icon'              => file_get_contents(NORTH_URL . 'inc/img/mind-icon.svg'),
			'keywords'          => array( 'notice', 'application', 'leep', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'block-styles', NORTH_URL . '/inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('block-styles');});

				},
			)
		);

		acf_register_block_type(array(
			'name'              => 'north-icon-blocks',
			'title'             => __('Horizontal Icon Blocks'),
			'description'       => __('A repeating blocck that displays horizontal icon blocks.'),
			'render_template'   => NORTH_ABSPATH . '/inc/block-templates/north-icon-blocks.php',
			'category'          => 'north-blocks',
			'icon'              => file_get_contents(NORTH_URL . 'inc/img/mind-icon.svg'),
			'keywords'          => array( 'icon', 'block', 'horizontal', 'check', 'leep', 'Mindshare' ),
			'align'             => 'full',
			'mode'            	=> 'edit',
			'supports'					=> array(
				'align' => false,
			),
			'enqueue_assets' => function(){
				// We're just registering it here and then with the action get_footer we'll enqueue it.
				wp_register_style( 'block-styles', NORTH_URL . '/inc/css/block-styles.css' );
				add_action( 'get_footer', function () {wp_enqueue_style('block-styles');});

				},
			)
		);




	}
});



if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_606522f282027',
	'title' => 'Block: Full Width Notice',
	'fields' => array(
		array(
			'key' => 'field_606522f9439cd',
			'label' => 'Notice Text',
			'name' => 'notice_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_606522fe439ce',
			'label' => 'Optional Link',
			'name' => 'optional_link',
			'type' => 'link',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/north-full-width-notice',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_6065e8f23c831',
	'title' => 'Block: Horizontal Icon Block',
	'fields' => array(
		array(
			'key' => 'field_6065e8fb93147',
			'label' => 'Horizontal Icon Blocks',
			'name' => 'horizontal_icon_blocks',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_6065e90693148',
					'label' => 'Blocks',
					'name' => 'blocks',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_6065e90c93149',
							'label' => 'Icon',
							'name' => 'icon',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_6065e9109314a',
							'label' => 'Label',
							'name' => 'label',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_6065e9149314b',
							'label' => 'Link',
							'name' => 'link',
							'type' => 'link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
						),
					),
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/north-icon-blocks',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_60679b23eac31',
	'title' => 'Block: Social Media Icons',
	'fields' => array(
		array(
			'key' => 'field_60679b2f52a80',
			'label' => 'Social Media Icons',
			'name' => 'social_media_icons',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_60679b3552a81',
					'label' => 'Icon Size',
					'name' => 'icon_size',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'sm' => 'Small',
						'md' => 'Medium',
						'lg' => 'Large',
						'2x' => '2x',
						'3x' => '3x',
						'4x' => '4x',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => '',
					'layout' => 'vertical',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_60679b5a52a82',
					'label' => 'Use icons from Website Settings?',
					'name' => 'icons_from_settings',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_60679b7352a83',
					'label' => 'Icons',
					'name' => 'icons',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_60679b5a52a82',
								'operator' => '!=',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_60679b7752a84',
							'label' => 'Icon',
							'name' => 'icon',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_60679b7a52a85',
							'label' => 'Link',
							'name' => 'link',
							'type' => 'link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
						),
					),
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/north-social-icons',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_6064ee7212bd7',
	'title' => 'Website Settings',
	'fields' => array(
		array(
			'key' => 'field_6064ee793c187',
			'label' => 'Social Media Icons',
			'name' => 'social_media_icons',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_6064ee7f3c188',
					'label' => 'Icon',
					'name' => 'icon',
					'type' => 'text',
					'instructions' => 'https://fontawesome.com/icons',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_6064ee8b3c189',
					'label' => 'Link',
					'name' => 'link',
					'type' => 'link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
				),
			),
		),
		array(
			'key' => 'field_6064ee923c18a',
			'label' => 'Contact Email',
			'name' => 'contact_email',
			'type' => 'email',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6064eea23c18b',
			'label' => 'Contact Phone',
			'name' => 'contact_phone',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => 1,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'website-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
