<?php
if (!defined('ABSPATH')) {
  exit;
}

$cggowl_repeatercarousel->add_control(
			'image',
			[
				'label' => esc_html__( 'Placeholder Image', 'cggowl' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
        'condition' => [
          'field_type' => 'image',
        ],
			]
		);

$cggowl_repeatercarousel->add_group_control(
    \Elementor\Group_Control_Image_Size::get_type(),
    [
        'name'      => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
        'default'   => 'large',
        'separator' => 'none',
        'condition' => [
          'field_type' => 'image',
        ],
    ]
);

$cggowl_repeatercarousel->add_control(
  'field_image_url',
  [
    'label'     => esc_html__('Image Type', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::SELECT,
    'default'   => 'featured',
    'options'   => [
      'featured'          => esc_html__('Featured Images', 'cggowl'),
      'acf_image'         => esc_html__('ACF Image', 'cggowl'),
      'custom_field'      => esc_html__('Custom Field', 'cggowl'),
      'woocommerce_image' => esc_html__('WooCommerce  Product Image', 'cggowl'),
    ],
    'condition' => [
      'field_type' => 'image',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
			'important_note_acf',
			[
				'label' => esc_html__( 'Important Note', 'cggowl' ),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'The return format of ACF image must be "Image ID". Field expects attachment ID', 'cggowl' ),
				'content_classes' => 'your-class',
        'condition'   => [
          'field_type'      => 'image',
          'field_image_url' => ['acf_image', 'custom_field'],
        ],
			]
		);

$cggowl_repeatercarousel->add_control(
  'field_image_acf_or_custom',
  [
    'label'     => esc_html__('ACF Field Selector', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::SELECT,
    'options'   => $this->get_acf_list(),
    'condition'   => [
      'field_type'      => 'image',
      'field_image_url' => ['acf_image', 'custom_field'],
    ],
  ]
);


$cggowl_repeatercarousel->start_controls_tabs(
  'coretabimageeffects'
);

$cggowl_repeatercarousel->start_controls_tab(
  'cggowl_image_hover_effect_tab_normal',
  [
    'label' => esc_html__( 'Normal', 'cggowl' ),
    'condition' => [
      'field_type' => 'image',
    ],
  ]
);


$cggowl_repeatercarousel->add_responsive_control(
			'cggowl_image_hover_effect_tab_normal_overlay',
			[
				'label' => esc_html__( 'Overlay Effect', 'cggowl' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
          'cggowl-overlay-effect-1-redtint'  => esc_html__( 'Red Overlay', 'cggowl' ),
          'cggowl-overlay-effect-1-greentint'  => esc_html__( 'Green Overlay', 'cggowl' ),
          'cggowl-overlay-effect-1-bluetint'  => esc_html__( 'Blue Overlay', 'cggowl' ),
          'cggowl-overlay-effect-1-greenrosetint'  => esc_html__( 'Green Rose Overlay', 'cggowl' ),
          'cggowl-overlay-effect-1-blueredtint'  => esc_html__( 'Blue Red Overlay', 'cggowl' ),
					'' => esc_html__( 'None', 'cggowl' ),
				],
        'condition' => [
          'field_type' => 'image',
        ],
			]
);

$cggowl_repeatercarousel->end_controls_tab();

$cggowl_repeatercarousel->start_controls_tab(
  'cggowl_image_hover_effect_tab_hover',
  [
    'label' => esc_html__( 'Hover', 'cggowl' ),
    'condition' => [
      'field_type' => 'image',
    ],
  ]
);

$cggowl_repeatercarousel->add_responsive_control(
			'cggowl_image_hover_effect_tab_hover_transition',
			[
				'label' => esc_html__( 'Transition Effect', 'cggowl' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'cggowl-transition-effect-1-hover'  => esc_html__( 'Zoom In', 'cggowl' ),
          'cggowl-transition-effect-1-hover-zoomout'  => esc_html__( 'Zoom Out', 'cggowl' ),
          'cggowl-transition-effect-1-hover-cir'  => esc_html__( 'Circle', 'cggowl' ),
          'cggowl-transition-effect-1-hover-shine'  => esc_html__( 'Shine', 'cggowl' ),
          'cggowl-transition-effect-1-hover-flash'  => esc_html__( 'Flash', 'cggowl' ),
          'cggowl-transition-effect-1-hover-rotate'  => esc_html__( 'Rotate', 'cggowl' ),
          'cggowl-transition-effect-1-hover-slide'  => esc_html__( 'Slide', 'cggowl' ),
          'cggowl-transition-effect-1-hover-blur'  => esc_html__( 'Blur', 'cggowl' ),
          'cggowl-transition-effect-1-hover-grey'  => esc_html__( 'Gray Scale', 'cggowl' ),
          'cggowl-transition-effect-1-hover-sepia'  => esc_html__( 'Sepia', 'cggowl' ),
					'' => esc_html__( 'None', 'cggowl' ),
				],
        'condition' => [
          'field_type' => 'image',
        ],
			]
);




$cggowl_repeatercarousel->add_responsive_control(
			'cggowl_image_hover_effect_tab_hover_overlay',
			[
				'label' => esc_html__( 'Overlay Effect', 'cggowl' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'cggowl-overlay-effect-1-hover-redtint'  => esc_html__( 'Red Overlay', 'cggowl' ),
          'cggowl-overlay-effect-1-hover-greentint'  => esc_html__( 'Green Overlay', 'cggowl' ),
          'cggowl-overlay-effect-1-hover-bluetint'  => esc_html__( 'Blue Overlay', 'cggowl' ),
          'cggowl-overlay-effect-1-hover-greenrosetint'  => esc_html__( 'Green Rose Overlay', 'cggowl' ),
          'cggowl-overlay-effect-1-hover-blueredtint'  => esc_html__( 'Blue Red Overlay', 'cggowl' ),
					'' => esc_html__( 'None', 'cggowl' ),
				],
        'condition' => [
          'field_type' => 'image',
        ],
			]
);


$cggowl_repeatercarousel->end_controls_tab();
$cggowl_repeatercarousel->end_controls_tabs();
