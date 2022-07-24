<?php
if (!defined('ABSPATH')) {
    exit;
}

$cggowl_repeatercarousel->add_control(
    'field_type',
    [
        'label'   => esc_html__('Field Type', 'cggowl'),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => 'title',
        'options' => [
            'title'     => esc_html__('Title', 'cggowl'),
            'content'   => esc_html__('Content', 'cggowl'),
            'excerpt'   => esc_html__('Excerpt', 'cggowl'),
            'metadatasingle' => esc_html__('Single Metadata', 'cggowl'),
            'metadata'  => esc_html__('Post/Page Metadata', 'cggowl'),
            'button'    => esc_html__('Button', 'cggowl'),
            'image'     => esc_html__('Image', 'cggowl'),
            'html'      => esc_html__('HTML', 'cggowl'),
            'shortcode' => esc_html__('Shortcode', 'cggowl'),
            'rating'    => esc_html__('WooCommerce Rating', 'cggowl'),
            'wooprice'  => esc_html__('WooCommerce Price', 'cggowl'),
            'shortcode_elementor_pro' => esc_html__('Elementor Pro Template', 'cggowl'),
        ],
    ]
);

$cggowl_repeatercarousel->add_control(
    'cggowl_enable_inner_controls',
    [
                'label' => esc_html__('Enable Inner Column', 'cggowl'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'cggowl'),
                'label_off' => esc_html__('Hide', 'cggowl'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
);

$cggowl_repeatercarousel->add_responsive_control(
    'cggowl_layout_inner',
    [
              'label'       => esc_html__('Inner Column Width', 'cggowl'),
              'type' => \Elementor\Controls_Manager::SLIDER,
              'size_units' => [ '%' ],
              'range' => [
                  '%' => [
                    'min' => 0,
                    'max' => 100,
                  ],
                ],
                'default' => [
                  'unit' => '%',
                  'size' => 100,
                ],
              'description' => __('Setting 50%/50% for 2 adjacent field type will put the content in same row. 25%-75% Supported', 'cggowl'),
              'selectors'   => [
                  '{{WRAPPER}} {{CURRENT_ITEM}}' => 'flex-basis: {{SIZE}}{{UNIT}}',
              ],
              'condition'  => [
                          'cggowl_enable_inner_controls' => ['yes'],
              ],
          ]
);

$cggowl_repeatercarousel->add_responsive_control(
    'cggowl_layout_inner_max_width',
    [
        'label'       => esc_html__('Inner Column Max Width', 'cggowl'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ '%' ],
        'range' => [
            '%' => [
              'min' => 0,
              'max' => 100,
            ],
          ],
          'default' => [
            'unit' => '%',
            'size' => 100,
          ],
        'description' => __('if content overflows using above control then this can be used', 'cggowl'),
        'condition'  => [
                    'cggowl_enable_inner_controls' => ['yes'],
        ],
    ]
);

//version 1.1.0 Update for content
        // Allows text content to be placed befor content
$cggowl_repeatercarousel->add_control(
    'cggowl_content_before_placer',
    [
              'label' => esc_html__('Content Before', 'cggowl'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'rows' => 2,
              'placeholder' => esc_html__('Adds the content before field type', 'cggowl'),
      'condition'    => [
          'field_type' => ['content','wooprice','shortcode'],
      ],
          ]
);

  //version 1.0.1 Update for content
  // Allows text content to placed after text
  $cggowl_repeatercarousel->add_control(
      'cggowl_content_after_placer',
      [
                'label' => esc_html__('Content After', 'cggowl'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'placeholder' => esc_html__('Adds the content after field type', 'cggowl'),
        'condition'    => [
            'field_type' => ['content','wooprice','shortcode'],
        ],
            ]
  );

//version 1.1.0 Update for content
// Allows text content to be placed befor content
$cggowl_repeatercarousel->add_control(
    'cggowl_content_before_placer_variable',
    [
              'label' => esc_html__('Variable Product | Content Before', 'cggowl'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'rows' => 2,
              'placeholder' => esc_html__('Adds the content before field type', 'cggowl'),
      'condition'    => [
          'field_type' => 'wooprice',
      ],
          ]
);

  //version 1.0.1 Update for content
  // Allows text content to placed after text
  $cggowl_repeatercarousel->add_control(
      'cggowl_content_after_placer_variable',
      [
                'label' => esc_html__('Variable Product | Content After', 'cggowl'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'placeholder' => esc_html__('Adds the content after field type', 'cggowl'),
        'condition'    => [
            'field_type' => 'wooprice',
        ],
            ]
  );

  $cggowl_repeatercarousel->add_responsive_control(
      'cggowl_layout_inner_min_height',
      [
                'label'       => esc_html__('Minimum Height', 'cggowl'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                      'min' => 0,
                      'max' => 500,
                    ],
                  ],
                  'default' => [
                    'unit' => 'px',
                    'size' => 0,
                  ],
                'description' => esc_html__('Value in pixels, This will make the height of individual fields equal', 'cggowl'),
                'selectors'   => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'min-height: {{SIZE}}{{UNIT}}',
                ],
            ]
  );
