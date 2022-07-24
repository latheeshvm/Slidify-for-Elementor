<?php
if (!defined('ABSPATH')) {
  exit;
}

$cggowl_repeatercarousel->add_control(
    'cgggowl_title_wrapper',
    [
        'label'   => esc_html__('Wrapper', 'cggowl'),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => 'div',
        'options' => [
            'h1'     => 'H1',
            'h2'     => 'H2',
            'h3'     => 'H3',
            'h4'     => 'H4',
            'h5'     => 'H5',
            'h6'     => 'H6',
            'div'    => 'div',
            'p'      => 'p',
        ],
        'condition'  => [
                    'field_type' => ['title'],
        ],
    ]
);

$cggowl_repeatercarousel->add_control(
			'hrsep1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

$cggowl_repeatercarousel->start_controls_tabs(
  'coretab'
);

$cggowl_repeatercarousel->start_controls_tab(
  'corestyling',
  [
    'label' => esc_html__( 'Styling', 'cggowl' ),
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_color',
  [
    'label'     => esc_html__('Color', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::COLOR,
    'default'   => '#54595f',
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_color_link',
  [
    'label'     => esc_html__('Link Color', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::COLOR,
    'default'   => '#13682e',
    'condition' => [
      'field_type'=> ['metadata','button','metadatasingle'],
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}  a' => 'color: {{VALUE}}',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_background_color',
  [
    'label'     => esc_html__('Background Color', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::COLOR,
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'background-color: {{VALUE}}',
    ],
  ]
);

$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_repeater_width',
  [
    'label' => esc_html__( 'Width', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SLIDER,
    'size_units' => [ 'px', '%' ],
    'range' => [
      'px' => [
        'min' => 0,
        'max' => 1000,
        'step' => 5,
      ],
      '%' => [
        'min' => 0,
        'max' => 100,
      ],
    ],
    'default' => [
      'unit' => '%',
      'size' => 100,
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'width: {{SIZE}}{{UNIT}};',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_background_z_index',
  [
    'label' => esc_html__( 'z-index', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::NUMBER,
    'default' => 1,
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'z-index: {{VALUE}}',
    ],
  ]
);

$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_repeater_background_position',
  [
    'label' => esc_html__( 'Position', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SELECT,
    'default' => 'relative',
    'options' => [
      'relative'  => esc_html__( 'Relative', 'cggowl' ),
      'absolute' => esc_html__( 'Absolute', 'cggowl' ),
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'position: {{VALUE}}',
    ],
  ]
);

$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_repeater_background_postion_top',
  [
    'label' => esc_html__( 'Top', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SLIDER,
    'size_units' => [ 'px', '%' ],
    'range' => [
      'px' => [
        'min' => 0,
        'max' => 1000,
        'step' => 5,
      ],
      '%' => [
        'min' => 0,
        'max' => 100,
      ],
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'top: {{SIZE}}{{UNIT}};',
    ],
    'condition' => [
      'cggowl_repeater_background_position'=> 'absolute',
    ],
  ]
);
$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_repeater_background_postion_left',
  [
    'label' => esc_html__( 'Left', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SLIDER,
    'size_units' => [ 'px', '%' ],
    'range' => [
      'px' => [
        'min' => 0,
        'max' => 1000,
        'step' => 5,
      ],
      '%' => [
        'min' => 0,
        'max' => 100,
      ],
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'left: {{SIZE}}{{UNIT}};',
    ],
    'condition' => [
      'cggowl_repeater_background_position'=> 'absolute',
    ],
  ]
);

$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_repeater_background_postion_bottom',
  [
    'label' => esc_html__( 'Bottom', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SLIDER,
    'size_units' => [ 'px', '%' ],
    'range' => [
      'px' => [
        'min' => 0,
        'max' => 1000,
        'step' => 5,
      ],
      '%' => [
        'min' => 0,
        'max' => 100,
      ],
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'bottom: {{SIZE}}{{UNIT}};',
    ],
    'condition' => [
      'cggowl_repeater_background_position'=> 'absolute',
    ],
  ]
);
$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_repeater_background_postion_right',
  [
    'label' => esc_html__( 'Right', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SLIDER,
    'size_units' => [ 'px', '%' ],
    'range' => [
      'px' => [
        'min' => 0,
        'max' => 1000,
        'step' => 5,
      ],
      '%' => [
        'min' => 0,
        'max' => 100,
      ],
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'right: {{SIZE}}{{UNIT}};',
    ],
    'condition' => [
      'cggowl_repeater_background_position'=> 'absolute',
    ],
  ]
);



$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_repeater_background_margin',
  [
    'label'      => esc_html__('Margin', 'cggowl'),
    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
    'size_units' => ['px', '%', 'em'],
    'selectors'  => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
    ],
  ]
);

$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_repeater_background_padding',
  [
    'label'      => esc_html__('Padding', 'cggowl'),
    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
    'size_units' => ['px', '%', 'em'],
    'selectors'  => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_color_border',
  [
    'label'     => esc_html__('Border Color', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::COLOR,
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'border-color: {{VALUE}}',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_border_size',
  [
    'label' => esc_html__( 'Border Style', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SELECT,
    'default' => 'solid',
    'options' => [
      'solid'  => esc_html__( 'Solid', 'cggowl' ),
      'dotted' => esc_html__( 'Dotted', 'cggowl' ),
      'dashed' => esc_html__( 'Dashed', 'cggowl' ),
      'double' => esc_html__( 'Double', 'cggowl' ),
      'groove' => esc_html__( 'Groove', 'cggowl' ),
      'ridge' => esc_html__( 'Ridge', 'cggowl' ),
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'border-style: {{VALUE}}',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_background_border_size',
  [
    'label'      => esc_html__('Border Size', 'cggowl'),
    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
    'size_units' => ['px', '%', 'em'],
    'default'    => [
      'top'      => '0',
      'right'    => '0',
      'bottom'   => '0',
      'left'     => '0',
      'isLinked' => true,
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_background_border_radius',
  [
    'label'      => esc_html__('Border Radius', 'cggowl'),
    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
    'size_units' => ['px', '%', 'em'],
    'default'    => [
      'top'      => '0',
      'right'    => '0',
      'bottom'   => '0',
      'left'     => '0',
      'isLinked' => true,
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}} .cggowl-elementor-innerblock' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
    ],
  ]
);



$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_font_family_notice_img',
  [
    'label' => esc_html__( 'Note', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::RAW_HTML,
    'raw' => esc_html__( 'Use controls below to modify the border parameters of image', 'cggowl' ),
    'content_classes' => 'your-class',
    'condition' => [
      'field_type'=> ['image'],
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_color_border_img',
  [
    'label'     => esc_html__('Border Color', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::COLOR,
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}  img' => 'border-color: {{VALUE}}',
    ],
    'condition' => [
      'field_type'=> ['image'],
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_border_size_img',
  [
    'label' => esc_html__( 'Border Style', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SELECT,
    'default' => 'solid',
    'options' => [
      'solid'  => esc_html__( 'Solid', 'cggowl' ),
      'dotted' => esc_html__( 'Dotted', 'cggowl' ),
      'dashed' => esc_html__( 'Dashed', 'cggowl' ),
      'double' => esc_html__( 'Double', 'cggowl' ),
      'groove' => esc_html__( 'Groove', 'cggowl' ),
      'ridge' => esc_html__( 'Ridge', 'cggowl' ),
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}  img' => 'border-style: {{VALUE}}',
    ],
    'condition' => [
      'field_type'=> ['image'],
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_background_border_size_img',
  [
    'label'      => esc_html__('Border Size', 'cggowl'),
    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
    'size_units' => ['px', '%', 'em'],
    'default'    => [
      'top'      => '0',
      'right'    => '0',
      'bottom'   => '0',
      'left'     => '0',
      'isLinked' => true,
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}  img' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
    ],
    'condition' => [
      'field_type'=> ['image'],
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_background_border_radius_img',
  [
    'label'      => esc_html__('Border Radius', 'cggowl'),
    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
    'size_units' => ['px', '%', 'em'],
    'default'    => [
      'top'      => '0',
      'right'    => '0',
      'bottom'   => '0',
      'left'     => '0',
      'isLinked' => true,
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}  img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
    ],
    'condition' => [
      'field_type'=> ['image'],
    ],
  ]
);


$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_alignment',
  [
    'label'   => esc_html__('Text Alignment', 'cggowl'),
    'type'    => \Elementor\Controls_Manager::CHOOSE,
    'options' => [
      'left'   => [
        'title' => esc_html__('Left', 'cggowl'),
        'icon'  => 'fa fa-align-left',
      ],
      'center' => [
        'title' => esc_html__('Center', 'cggowl'),
        'icon'  => 'fa fa-align-center',
      ],
      'right'  => [
        'title' => esc_html__('Right', 'cggowl'),
        'icon'  => 'fa fa-align-right',
      ],
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'text-align: {{VALUE}}',
    ],
    'default' => 'center',
    'toggle'  => true,
  ]
);



$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_alignment_content',
  [
    'label'   => esc_html__('Content Alignment', 'cggowl'),
    'type'    => \Elementor\Controls_Manager::CHOOSE,
    'options' => [
      'left'   => [
        'flex-start' => esc_html__('Left', 'cggowl'),
        'icon'  => 'fa fa-align-left',
      ],
      'center' => [
        'title' => esc_html__('Center', 'cggowl'),
        'icon'  => 'fa fa-align-center',
      ],
      'flex-end'  => [
        'title' => esc_html__('Right', 'cggowl'),
        'icon'  => 'fa fa-align-right',
      ],
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'justify-content: {{VALUE}}',
    ],
    'default' => 'center',
    'toggle'  => true,
  ]
);

$cggowl_repeatercarousel->end_controls_tab();

$cggowl_repeatercarousel->start_controls_tab(
  'core_typo',
  [
    'label' => esc_html__( 'Typography', 'cggowl' ),
  ]
);


$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_more_options',
  [
    'label' => esc_html__( 'Typography', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::HEADING,
    'separator' => 'after',
  ]
);



$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_font_family_notice',
  [
    'label' => esc_html__( 'Note', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::RAW_HTML,
    'content_classes' => 'your-class',
  ]
);


$cggowl_repeatercarousel->add_control(
  'cggowl_repeater_font_family',
  [
    'label' => esc_html__( 'Font Family', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::FONT,
    'default' => "'Open Sans', sans-serif",
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'font-family: {{VALUE}}',
    ],
  ]
);


$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_font_size',
  [
    'label' => esc_html_x( 'Size', 'Typography Control', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SLIDER,
    'size_units' => [ 'px', 'em', 'rem', 'vw' ],
    'range' => [
      'px' => [
        'min' => 1,
        'max' => 200,
      ],
      'vw' => [
        'min' => 0.1,
        'max' => 10,
        'step' => 0.1,
      ],
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'font-size: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h1' => 'font-size: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h2' => 'font-size: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h3' => 'font-size: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h4' => 'font-size: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h5' => 'font-size: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h6' => 'font-size: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} p' => 'font-size: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} div' => 'font-size: {{SIZE}}{{UNIT}}',
    ],
  ]
);

foreach ( array_merge( [ 'normal', 'bold' ], range( 100, 900, 100 ) ) as $weight ) {
  $typo_weight_options[ $weight ] = ucfirst( $weight );
}

$cggowl_repeatercarousel->add_control(
  'cggowl_font_weight',
  [
    'label' => esc_html_x( 'Weight', 'Typography Control', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SELECT,
    'default' => '',
    'options' => $typo_weight_options,
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'font-weight: {{VALUE}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h1' => 'font-weight: {{VALUE}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h2' => 'font-weight: {{VALUE}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h3' => 'font-weight: {{VALUE}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h4' => 'font-weight: {{VALUE}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h5' => 'font-weight: {{VALUE}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h6' => 'font-weight: {{VALUE}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} p' => 'font-weight: {{VALUE}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} div' => 'font-weight: {{VALUE}}',
    ],
  ]
);


$cggowl_repeatercarousel->add_control(
  'cggowl_font_transform',
  [
    'label' => esc_html_x( 'Transform', 'Typography Control', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SELECT,
    'default' => '',
    'options' => [
      '' => esc_html__( 'Default', 'cggowl' ),
      'uppercase' => esc_html_x( 'Uppercase', 'Typography Control', 'cggowl' ),
      'lowercase' => esc_html_x( 'Lowercase', 'Typography Control', 'cggowl' ),
      'capitalize' => esc_html_x( 'Capitalize', 'Typography Control', 'cggowl' ),
      'none' => esc_html_x( 'Normal', 'Typography Control', 'cggowl' ),
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'text-transform: {{VALUE}}',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_font_style',
  [
    'label' => esc_html_x( 'Style', 'Typography Control', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SELECT,
    'default' => '',
    'options' => [
      '' => esc_html__( 'Default', 'cggowl' ),
      'normal' => esc_html_x( 'Normal', 'Typography Control', 'cggowl' ),
      'italic' => esc_html_x( 'Italic', 'Typography Control', 'cggowl' ),
      'oblique' => esc_html_x( 'Oblique', 'Typography Control', 'cggowl' ),
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'font-style: {{VALUE}}',
    ],
  ]
);


$cggowl_repeatercarousel->add_control(
  'cggowl_font_decoration',
  [
    'label' => esc_html_x( 'Decoration', 'Typography Control', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SELECT,
    'default' => 'None',
    'options' => [
      '' => esc_html__( 'Default', 'cggowl' ),
      'underline' => esc_html_x( 'Underline', 'Typography Control', 'cggowl' ),
      'overline' => esc_html_x( 'Overline', 'Typography Control', 'cggowl' ),
      'line-through' => esc_html_x( 'Line Through', 'Typography Control', 'cggowl' ),
      'none' => esc_html_x( 'None', 'Typography Control', 'cggowl' ),
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'text-decoration: {{VALUE}}',
    ],
  ]
);

$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_font_lineheight',
  [
    'label' => esc_html_x( 'Line-Height', 'Typography Control', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SLIDER,
    'desktop_default' => [
      'unit' => 'em',
    ],
    'tablet_default' => [
      'unit' => 'em',
    ],
    'mobile_default' => [
      'unit' => 'em',
    ],
    'range' => [
      'px' => [
        'min' => 1,
      ],
    ],
    'size_units' => [ 'px', 'em' ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'line-height: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h1' => 'line-height: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h2' => 'line-height: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h3' => 'line-height: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h4' => 'line-height: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h5' => 'line-height: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} h6' => 'line-height: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} p' => 'line-height: {{SIZE}}{{UNIT}}',
      '{{WRAPPER}} {{CURRENT_ITEM}} div' => 'line-height: {{SIZE}}{{UNIT}}',
    ],
  ]
);


$cggowl_repeatercarousel->add_responsive_control(
  'cggowl_font_letterspacing',
  [
    'label' => esc_html_x( 'Letter Spacing', 'Typography Control', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::SLIDER,
    'range' => [
      'px' => [
        'min' => -5,
        'max' => 10,
        'step' => 0.1,
      ],
    ],
    'selectors' => [
      '{{WRAPPER}} {{CURRENT_ITEM}}' => 'letter-spacing: {{SIZE}}{{UNIT}}',
    ],
  ]
);


$cggowl_repeatercarousel->end_controls_tab();

$cggowl_repeatercarousel->start_controls_tab(
  'core_anim',
  [
    'label' => esc_html__( 'Advanced', 'cggowl' ),
  ]
);




$cggowl_repeatercarousel->add_control(
  'more_options_anim',
  [
    'label' => esc_html__( 'Animations', 'cggowl' ),
    'type' => \Elementor\Controls_Manager::HEADING,
    'separator' => 'before',
  ]
);



$cggowl_repeatercarousel->add_control(
  'field_class',
  [
    'label'   => esc_html__('Class', 'cggowl'),
    'type'    => \Elementor\Controls_Manager::TEXT,
    'default' => esc_html__('cggowl-class-css', 'cggowl'),
  ]
);

$cggowl_repeatercarousel->add_control(
  'field_id',
  [
    'label'   => esc_html__('ID', 'cggowl'),
    'type'    => \Elementor\Controls_Manager::TEXT,
    'default' => esc_html__('cggowl-class-css', 'cggowl'),
  ]
);
$cggowl_repeatercarousel->end_controls_tab();
$cggowl_repeatercarousel->end_controls_tabs();
