<?php
$this->start_controls_section(
    'cggowl_carousel_designer',
    [
        'label' => esc_html__('Carousel Designer', 'cggowl'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$this->add_control(
    'post_count',
    [
        'label'   => esc_html__('Number of posts to load', 'cggowl'),
        'type'    => \Elementor\Controls_Manager::NUMBER,
        'default' => '',
    ]
);

$this->start_controls_tabs(
    'cggowl_responsive_controller'
);

$this->start_controls_tab(
    'cggowl_responsive_controller_desktop',
    [
        'label' => esc_html__('Desktop', 'cggowl'),
    ]
);

$this->add_control(
    'cggowl_carousel_column_dektop',
    [
        'label'   => esc_html__('Column count in Desktop Devices', 'cggowl'),
        'type'    => \Elementor\Controls_Manager::NUMBER,
        'min'     => 1,
        'max'     => 12,
        'step'    => 1,
        'default' => 4,
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'cggowl_responsive_controller_tablet',
    [
        'label' => esc_html__('Tablets', 'cggowl'),
    ]
);

$this->add_control(
    'cggowl_carousel_column_tablet',
    [
        'label'   => esc_html__('Column count in Tablet Devices', 'cggowl'),
        'type'    => \Elementor\Controls_Manager::NUMBER,
        'min'     => 1,
        'max'     => 12,
        'step'    => 1,
        'default' => 3,
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'cggowl_responsive_controller_mobile',
    [
        'label' => esc_html__('Mobile', 'cggowl'),
    ]
);

$this->add_control(
    'cggowl_carousel_column_mobile',
    [
        'label'   => esc_html__('Column count in Mobile Devices', 'cggowl'),
        'type'    => \Elementor\Controls_Manager::NUMBER,
        'min'     => 1,
        'max'     => 12,
        'step'    => 1,
        'default' => 1,
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_control(
    'cggowl_responsive_controller_hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->add_responsive_control(
    'cggowl_carousel_gap',
    [
        'label'           => esc_html__('Spacing', 'cggowl'),
        'type'            => \Elementor\Controls_Manager::SLIDER,
        'range'           => [
            'px' => [
                'min' => 0,
                'max' => 1000,
            ],
        ],
        'devices'         => ['desktop', 'tablet', 'mobile'],
        'desktop_default' => [
            'size' => 0,
            'unit' => 'px',
        ],
        'tablet_default'  => [
            'size' => 0,
            'unit' => 'px',
        ],
        'mobile_default'  => [
            'size' => 0,
            'unit' => 'px',
        ],
        'selectors'       => [
            '{{WRAPPER}} .cggowl-card-design-outer' => 'margin-right: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'make_block_clickable',
    [
        'label'        => esc_html__('Make carousel clickable', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        'default'      => '',
    ]
);

$this->add_control(
    'make_block_clickable_makeit_acf',
    [
                'label'        => esc_html__('Make it ACF link', 'cggowl'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'cggowl'),
                'label_off'    => esc_html__('No', 'cggowl'),
                'return_value' => 'yes',
                'default'      => '',
                'condition'   => [
                  'make_block_clickable' => ['yes'],
                ],
            ]
);

$this->add_control(
    'make_block_clickable_makeit_acf_field',
    [
    'label'       => esc_html__('Custom Field Name', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::SELECT,
    'options'   => $this->get_acf_list(),
    'description' => esc_html__('Note : the field should return url', 'cggowl'),
    'condition'   => [
      'make_block_clickable_makeit_acf' => ['yes'],
    ],
  ]
);


$this->add_control(
    'make_block_clickable_makeit_acf_open_new_tab',
    [
        'label'        => esc_html__('Open in New Tab', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        'default'      => '',
        'condition'   => [
          'make_block_clickable' => ['yes'],
        ],
    ]
);


$this->add_control(
    'cggowl_align_content_carousel',
    [
        'label'     => esc_html__('Align Content', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'options'   => [
            'flex-start' => esc_html__('Top', 'cggowl'),
            'Center'     => esc_html__('Center', 'cggowl'),
            'flex-end'   => esc_html__('Bottom', 'cggowl'),
        ],
        'selectors' => [
            '{{WRAPPER}} .cggowl-card-design' => 'align-content: {{VALUE}}',
        ],
        'default'   => 'flex-start',

    ]
);

$this->add_control(
    'cggowl_carousel_enable_min_hight',
    [
        'label'     => esc_html__('carousel minimum height (px)', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::NUMBER,
        'selectors' => [
            '{{WRAPPER}} .cggowl-card-design' => 'min-height: {{VALUE}}px',
        ],
        'default'   => 0,

    ]
);

$this->add_control(
    'cggowl_features_hr',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->add_control(
    'cggowl_background_and_border_heading',
    [
        'label' => esc_html__('Background and Border', 'cggowl'),
        'type'  => \Elementor\Controls_Manager::HEADING,
    ]
);

$this->add_control(
    'cggowl_heading_back_in_out',
    [
        'type'            => \Elementor\Controls_Manager::RAW_HTML,
        'raw'             => esc_html__('Each individual carousel have an outer and inner container.', 'cggowl'),
        'content_classes' => 'cggowl-descriptor',
    ]
);

$this->start_controls_tabs(
    'cggowl_background_and_border_heading_tabs'
);

$this->start_controls_tab(
    'cggowl_innercarousel_tab',
    [
        'label' => esc_html__('Inner carousel', 'cggowl'),
    ]
);

$this->add_control(
    'cggowl_make_featured_image_as_background',
    [
        'label'        => esc_html__('Make Featured image as background', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        'default'      => '',
    ]
);

$this->add_control(
    'cggowl_b_top_grad',
    [
        'label'     => esc_html__('Top gradient', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'default'   => 'rgba(0,0,0,0)',
        'condition' => [
            'cggowl_make_featured_image_as_background' => 'yes',
        ],
    ]
);

$this->add_control(
    'cggowl_b_bottom_grad',
    [
        'label'     => esc_html__('Bottom gradient', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'default'   => 'rgba(192,252,53,0.88)',
        'condition' => [
            'cggowl_make_featured_image_as_background' => 'yes',
        ],
    ]
);

$this->add_control(
    'cggowl_b_cover',
    [
        'label'     => esc_html__('Background Size', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => 'cover',
        'options'   => [
            'auto'    => esc_html__('Auto', 'cggowl'),
            'length'  => esc_html__('Length', 'cggowl'),
            'cover'   => esc_html__('Cover', 'cggowl'),
            'contain' => esc_html__('Contain', 'cggowl'),
            'initial' => esc_html__('Initial', 'cggowl'),
            'inherit' => esc_html__('Inherit', 'cggowl'),
        ],
        'condition' => [
            'cggowl_make_featured_image_as_background' => 'yes',
        ],
    ]
);

$this->add_control(
    'cggowl_b_position',
    [
        'label'     => esc_html__('Background Position', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => 'center center',
        'options'   => [
            'left top'        => esc_html__('left top', 'cggowl'),
            'left center'     => esc_html__('left center', 'cggowl'),
            'left bottom'     => esc_html__('left bottom', 'cggowl'),
            'right top'       => esc_html__('right top', 'cggowl'),
            'right center'    => esc_html__('right center', 'cggowl'),
            'right bottom'    => esc_html__('right bottom', 'cggowl'),
            'center top'      => esc_html__('center top', 'cggowl'),
            'center center'   => esc_html__('center center', 'cggowl'),
            'center bottom  ' => esc_html__('center bottom  ', 'cggowl'),
        ],
        'condition' => [
            'cggowl_make_featured_image_as_background' => 'yes',
        ],
    ]
);

$this->add_control(
    'cggowl_b_repeat',
    [
        'label'     => esc_html__('Background Size', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => 'no-repeat',
        'options'   => [
            'repeat'    => esc_html__('Repeat', 'cggowl'),
            'repeat-x'  => esc_html__('Repeat-x', 'cggowl'),
            'repeat-y'  => esc_html__('Repeat-y', 'cggowl'),
            'no-repeat' => esc_html__('No-repeat', 'cggowl'),
            'initial'   => esc_html__('Initial', 'cggowl'),
            'inherit'   => esc_html__('Inherit', 'cggowl'),
        ],
        'condition' => [
            'cggowl_make_featured_image_as_background' => 'yes',
        ],
    ]
);

$this->add_control(
    'cggowl_back_featured_image_size',
    [
        'label'     => esc_html__('Select Images Size', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'options'   => $cggowl_image_size_list,
        'condition' => [
            'cggowl_make_featured_image_as_background' => 'yes',
        ],
    ]
);

$this->add_control(
    'Inner_carousel_Designer',
    [
        'label' => esc_html__('Background For carousel', 'cggowl'),
        'type'  => \Elementor\Controls_Manager::HEADING,
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name'     => 'cggowl_carousel_background',
        'label'    => esc_html__('carousel Background', 'cggowl'),
        'types'    => ['classic', 'gradient'],
        'selector' => '{{WRAPPER}} .cggowl-card-design',
    ]
);

$this->add_control(
    'cggowl_carousel_box_border_radius',
    [
        'label'     => esc_html__('carousel border radius (px)', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::NUMBER,
        'selectors' => [
            '{{WRAPPER}} .cggowl-card-design' => 'border-radius: {{VALUE}}px',
        ],
        'default'   => 0,

    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name'     => 'cggowl_box_shadow_inner',
        'label'    => esc_html__('Box Shadow', 'cggowl'),
        'selector' => '{{WRAPPER}} .cggowl-card-design',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name'     => 'cggowl_border_carousel_inner',
        'label'    => esc_html__('carousel Box Border', 'cggowl'),
        'selector' => '{{WRAPPER}} .cggowl-card-design',
    ]
);

$this->add_control(
    'cggowl_carousel_block_padding_full',
    [
        'label'      => esc_html__('carousel padding', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'default'    => [
            'top'      => '0',
            'right'    => '0',
            'bottom'   => '0',
            'left'     => '0',
            'isLinked' => true,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-card-design' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'cggowl_outcarousel_tab',
    [
        'label' => esc_html__('Outer carousel', 'cggowl'),
    ]
);

$this->add_control(
    'Outer_carousel_Designer',
    [
        'label' => esc_html__('Background For Outer carousel', 'cggowl'),
        'type'  => \Elementor\Controls_Manager::HEADING,
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name'     => 'cggowl_carousel_background_outer',
        'label'    => esc_html__('Outer carousel Background', 'cggowl'),
        'types'    => ['classic', 'gradient'],
        'selector' => '{{WRAPPER}} .cggowl-card-design-outer',
    ]
);

$this->add_control(
    'cggowl_carousel_box_border_radius_outer',
    [
        'label'     => esc_html__('Outer carousel border radius (px)', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::NUMBER,
        'selectors' => [
            '{{WRAPPER}} .cggowl-card-design-outer' => 'border-radius: {{VALUE}}px',
        ],
        'default'   => 0,

    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name'     => 'cggowl_box_shadow_outer',
        'label'    => esc_html__('Box Shadow', 'cggowl'),
        'selector' => '{{WRAPPER}} .cggowl-card-design',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name'     => 'cggowl_border_carousel_outer',
        'label'    => esc_html__('carousel Box Border', 'cggowl'),
        'selector' => '{{WRAPPER}} .cggowl-card-design-outer',
    ]
);

$this->add_control(
    'cggowl_carousel_block_padding_full_outer',
    [
        'label'      => esc_html__('Outer carousel padding', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'default'    => [
            'top'      => '0',
            'right'    => '0',
            'bottom'   => '0',
            'left'     => '0',
            'isLinked' => true,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-card-design-outer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
