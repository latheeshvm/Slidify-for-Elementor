<?php

$this->start_controls_section(
    'content_section_carousel_controls',
    [
        'label' => esc_html__('Carousel Controls', 'cggowl'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$this->add_responsive_control(
    'cggowl_container_width',
    [
        'label'      => esc_html__('Carousel Width', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px', '%'],
        'range'      => [
            'px' => [
                'min'  => 0,
                'max'  => 1000,
                'step' => 5,
            ],
            '%'  => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'default'    => [
            'unit' => '%',
            'size' => 100,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-container' => 'width: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_container_height',
    [
        'label'      => esc_html__('Carousel Height', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px', '%'],
        'range'      => [
            'px' => [
                'min'  => 0,
                'max'  => 1000,
                'step' => 5,
            ],
            '%'  => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'default'    => [
            'unit' => '%',
            'size' => 100,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-container' => 'height: {{SIZE}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'cggowl_center_sliders_u',
    [
        'label'        => esc_html__('Center Slides', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->add_responsive_control(
    'cggowl_offset_before',
    [
        'label'       => esc_html__('Offset before', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::NUMBER,
        'description' => esc_html__('Adds space before the carousel. Usefull if HTML content is placed before carousel', 'cggowl'),
        'default'     => 0,

    ]
);
$this->add_responsive_control(
    'cggowl_offset_after',
    [
        'label'       => esc_html__('Offset After', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::NUMBER,
        'description' => esc_html__('Adds space after the carousel. Usefull if HTML content is placed after carousel', 'cggowl'),
        'default'     => 0,
    ]
);

$this->add_control(
    'cggowl_grabcursor_u',
    [
        'label'        => esc_html__('Enable Grab Cursor', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cggowl_direction_u',
    [
        'label'       => esc_html__('Direction', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::SELECT,
        'default'     => 'horizontal',
        'description' => esc_html__('If vertical slider is used then adjust the height of carousel to fixed px value. eg: 300px;', 'cggowl'),
        'options'     => [
            'horizontal' => esc_html__('Horizontal', 'cggowl'),
            'vertical'   => esc_html__('Vertical', 'cggowl'),
        ],
    ]
);

$this->add_control(
    'cggowl_loop_u',
    [
        'label'        => esc_html__('Enable Loop', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cggowl_effect_u',
    [
        'label'       => esc_html__('Effect', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::SELECT,
        'default'     => '',
        'description' => esc_html__('Note: when using slide,fade,cube and flip set the slides per veiw to one', 'cggowl'),
        'options'     => [
            ''          => esc_html__('None', 'cggowl'),
            'slide'     => esc_html__('Slide', 'cggowl'),
            'fade'      => esc_html__('Fade', 'cggowl'),
            'cube'      => esc_html__('Cube', 'cggowl'),
            'coverflow' => esc_html__('Coveflow', 'cggowl'),
            'flip'      => esc_html__('Flip', 'cggowl'),
        ],
        'condition'   => [
            'cggowl_loop_u' => 'yes',
        ],
    ]
);

$this->add_control(
    'cggowl_autoplay_u',
    [
        'label'        => esc_html__('Enable Autoplay', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cggowl_delay_u',
    [
        'label'       => esc_html__('Delay', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::NUMBER,
        'description' => esc_html__('Delay Between transitions (in ms)', 'cggowl'),
        'default'     => 3000,
        'condition'   => [
            'cggowl_autoplay_u' => 'yes',
        ],
    ]
);

$this->add_control(
    'cggowl_autoplay_disable_on_inter_u',
    [
        'label'        => esc_html__('Disable autoplay on interaction', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        'condition'    => [
            'cggowl_autoplay_u' => 'yes',
        ],
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cggowl_autoplay_stop_on_last_u',
    [
        'label'        => esc_html__('Stop autoplay on last', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        'condition'    => [
            'cggowl_autoplay_u' => 'yes',
        ],
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cgggowl_reverse_autoplay_direct_u',
    [
        'label'        => esc_html__('Reverse autoplay direction', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        'condition'    => [
            'cggowl_autoplay_u' => 'yes',
        ],
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cgggowl_enable_keyboard_u',
    [
        'label'        => esc_html__('Enable Keyboard Scroll', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cgggowl_enable_mousescroll_u',
    [
        'label'        => esc_html__('Enable Mouse scroll', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cgggowl_enable_mousescroll_reverse_u',
    [
        'label'        => esc_html__('Reverse Mouse Wheel Scroll', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cgggowl_enable_pagination_u',
    [
        'label'        => esc_html__('Enable Pagination', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cggowl_pagination_type_u',
    [
        'label'     => esc_html__('Pagination Type', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => 'bullets',
        'options'   => [
            'bullets'     => esc_html__('Bullets', 'cggowl'),
            'progressbar' => esc_html__('Progressbar', 'cggowl'),
            'fraction'    => esc_html__('Fraction', 'cggowl'),
        ],
        'condition' => [
            'cgggowl_enable_pagination_u' => 'yes',
        ],
    ]
);

$this->add_control(
    'cgggowl_enable_pagination_clickable_u',
    [
        'label'        => esc_html__('Make Pagination clickable', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'description'  => esc_html__('If true then clicking on pagination button will cause transition to appropriate slide. Only for bullets pagination type', 'cggowl'),
        'return_value' => 'yes',
        'condition'    => [
            'cgggowl_enable_pagination_u' => 'yes',
        ],
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cggowl_next_icon_color_paginate',
    [
        'label'     => esc_html__('Dot Color', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'default'   => '#252525',
        'selectors' => [
            '{{WRAPPER}} .swiper-pagination-bullet' => 'background: {{VALUE}}',
        ],
        'condition' => [
            'cgggowl_enable_pagination_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_paginatioon_width',
    [
        'label'       => esc_html__('Dot Width', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::NUMBER,
        'description' => esc_html__('Set the width of Dot', 'cggowl'),
        'default'     => 20,
        'selectors' => [
            '{{WRAPPER}} .swiper-pagination-bullet' => 'width: {{VALUE}}px',
        ],
        'condition' => [
            'cgggowl_enable_pagination_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_paginatioon_height',
    [
        'label'       => esc_html__('Dot Height', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::NUMBER,
        'description' => esc_html__('Set the height of Dot', 'cggowl'),
        'default'     => 20,
        'selectors' => [
            '{{WRAPPER}} .swiper-pagination-bullet' => 'height: {{VALUE}}px',
        ],
        'condition' => [
            'cgggowl_enable_pagination_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_paginatioon_borderradius',
    [
        'label'       => esc_html__('Dot Border Radius', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::NUMBER,
        'description' => esc_html__('Set the height of Dot', 'cggowl'),
        'default'     => 100,
        'selectors' => [
            '{{WRAPPER}} .swiper-pagination-bullet' => 'border-radius: {{VALUE}}%',
        ],
    ]
);



$this->add_control(
    'cgggowl_enable_arrow_u',
    [
        'label'        => esc_html__('Enable Arrow Navigation', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'description'  => esc_html__('If the icons dont show up, please remove the active one and reselect from the list again', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->start_controls_tabs(
    'cggowl_tab_arrow_design'
);

$this->start_controls_tab(
    'cggowl_next_arrow',
    [
        'label'     => esc_html__('Next Arrow', 'cggowl'),
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],

    ]
);

$this->add_responsive_control(
    'cggowl_next_vertical_align',
    [
        'label'      => esc_html__('Vertical Alignment', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['%'],
        'range'      => [
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'default'    => [
            'unit' => '%',
            'size' => 50,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-button-next' => 'top: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_next_horizontal_align',
    [
        'label'      => esc_html__('Horizontal Alignment', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['%'],
        'range'      => [
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'default'    => [
            'unit' => '%',
            'size' => 0,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-button-next' => 'right: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_next_margin_outer',
    [
        'label'      => esc_html__('Arrow Margin', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-button-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name'     => 'cggowl_next_background',
        'label'    => esc_html__('Background', 'cggowl'),
        'types'    => ['classic', 'gradient'],
        'selector' => '{{WRAPPER}} .cggowl-button-next',
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_control(
    'cggowl_next_icon_color',
    [
        'label'     => esc_html__('Icon Color', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'default'   => '#10b945',
        'selectors' => [
            '{{WRAPPER}} .cggowl-button-next i' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_prev_font_size_next_sizer',
    [
        'label'      => esc_html__('Icon Font Size', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px'],
        'range'      => [
            '%' => [
                'min' => 0,
                'max' => 200,
            ],
        ],
        'default'    => [
            'unit' => 'px',
            'size' => 15,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-button-next i' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_next_icon_padding',
    [
        'label'      => esc_html__('Icon Padding', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-button-next i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_next_icon_margin',
    [
        'label'      => esc_html__('Icon Margin', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-button-next i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);


$this->add_control(
    'cggowl_next_icon_code_update_next',
    [
            'label' => esc_html__('Icon', 'cggowl'),
            'type' => \Elementor\Controls_Manager::ICONS,
            
    'condition' => [
        'cgggowl_enable_arrow_u' => 'yes',
    ],
        ]
);



$this->end_controls_tab();

$this->start_controls_tab(
    'cggowl_prev_arrow',
    [
        'label'     => esc_html__('Prev Arrow', 'cggowl'),
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_prev_vertical_align',
    [
        'label'      => esc_html__('Vertical Alignment', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['%'],
        'range'      => [
            '%' => [
                'min' => 0,
                'max' => 600,
            ],
        ],
        'default'    => [
            'unit' => '%',
            'size' => 50,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-button-prev' => 'top: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_prev_horizontal_align',
    [
        'label'      => esc_html__('Horizontal Alignment', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['%'],
        'range'      => [
            '%' => [
                'min' => 0,
                'max' => 600,
            ],
        ],
        'default'    => [
            'unit' => '%',
            'size' => 0,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-button-prev' => 'left: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_prev_margin_outer',
    [
        'label'       => esc_html__('Arrow Margin', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units'  => ['px', '%', 'em'],
        'description' => esc_html__('Set the margin for navigation element', 'cggowl'),
        'selectors'   => [
            '{{WRAPPER}} .cggowl-button-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name'        => 'cggowl_prev_background',
        'label'       => esc_html__('Background', 'cggowl'),
        'types'       => ['classic', 'gradient'],
        'description' => esc_html__('Set the background for icon', 'cggowl'),
        'selector'    => '{{WRAPPER}} .cggowl-button-prev',
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_control(
    'cggowl_prev_icon_color',
    [
        'label'       => esc_html__('Icon Color', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::COLOR,
        'description' => esc_html__('Set the icon color', 'cggowl'),
        'default'     => '#10b945',
        'selectors'   => [
            '{{WRAPPER}} .cggowl-button-prev i' => 'color: {{VALUE}}',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_prev_font_size_prev',
    [
        'label'      => esc_html__('Icon Font Size', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px'],
        'range'      => [
            '%' => [
                'min' => 0,
                'max' => 200,
            ],
        ],
        'default'    => [
            'unit' => 'px',
            'size' => 15,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-button-prev i' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);



$this->add_responsive_control(
    'cggowl_prev_icon_padding',
    [
        'label'       => esc_html__('Icon Padding', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units'  => ['px', '%', 'em'],
        'description' => esc_html__('Set the padding for icon', 'cggowl'),
        'selectors'   => [
            '{{WRAPPER}} .cggowl-button-prev i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_responsive_control(
    'cggowl_prev_icon_margin',
    [
        'label'       => esc_html__('Icon Margin', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units'  => ['px', '%', 'em'],
        'description' => esc_html__('Set the margin for icon', 'cggowl'),
        'selectors'   => [
            '{{WRAPPER}} .cggowl-button-prev i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
            'cgggowl_enable_arrow_u' => 'yes',
        ],
    ]
);

$this->add_control(
    'cggowl_next_icon_code_update_prev',
    [
    'label' => esc_html__('Icon', 'cggowl'),
    'type' => \Elementor\Controls_Manager::ICONS,
    'condition' => [
        'cgggowl_enable_arrow_u' => 'yes',
    ],
  ]
);


$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_control(
    'cgggowl_scrollbar_seperator',
    [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ]
);

$this->add_control(
    'cgggowl_enable_scrollbar_u',
    [
        'label'        => esc_html__('Enable Scroll bar', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->add_control(
    'cgggowl_enable_scrollbar_dragabble_u',
    [
        'label'        => esc_html__('Make Scroll bar Draggable', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
        'condition'    => [
            'cgggowl_enable_scrollbar_u' => 'yes',
        ],
    ]
);

$this->add_control(
    'cgggowl_enable_lazy_load',
    [
        'label'        => esc_html__('Enable Lazy Load', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Yes', 'cggowl'),
        'label_off'    => esc_html__('No', 'cggowl'),
        'return_value' => 'yes',
        // 'default' => 'yes',
    ]
);

$this->end_controls_section();
