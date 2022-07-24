<?php
$this->start_controls_section(
    'cggowl_carousel_design',
    [
        'label' => esc_html__('Carousel Maker', 'cggowl'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);


$this->add_control(
    'cggowl_heading_carousel_designer',
    [
        'type'            => \Elementor\Controls_Manager::RAW_HTML,
        'raw'             => esc_html__('Use sortable drag and drop carousel maker to create/arrange the layout for your carousel.', 'cggowl'),
        'content_classes' => 'cggowl-descriptor',
    ]
);

$this->add_responsive_control(
    'cggowl_layout',
    [
        'label'     => esc_html__('Column Count', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => 'flex',
        'options'   => [
            'flex' => esc_html__('1 Colum Layout', 'cggowl'),
            'grid' => esc_html__('2 Colum Layout', 'cggowl'),
        ],
        'selectors' => [
            '{{WRAPPER}} .cggowl-card-design-mul' => 'display: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'cggowl_width_control',
    [
        'label'      => esc_html__('Column 1 Width', 'cggowl'),
        'type'       => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['fr'],
        'range'      => [
            'fr' => [
                'min'  => 0,
                'max'  => 5,
                'step' => 0.1,
            ],
        ],
        'default'    => [
            'unit' => 'fr',
            'size' => 1,
        ],
        'selectors'  => [
            '{{WRAPPER}} .cggowl-card-design-mul' => 'grid-template-columns: {{SIZE}}{{UNIT}} 1fr;',
        ],
        'condition'  => [
            'cggowl_layout' => ['grid'],
        ],
    ]
);

$this->add_control(
    'cggowl_align_content_grid_ver',
    [
        'label'     => esc_html__('Vertical Align Content', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'options'   => [
            'flex-start' => esc_html__('Top', 'cggowl'),
            'Center'     => esc_html__('Center', 'cggowl'),
            'flex-end'   => esc_html__('Bottom', 'cggowl'),
        ],
        'selectors' => [
            '{{WRAPPER}} .cggowl-card-design-mul' => 'align-items: {{VALUE}}',
        ],
        'default'   => 'flex-start',
        'condition' => [
            'cggowl_layout' => ['grid'],
        ],
    ]
);

$cggowl_repeatercarousel = new \Elementor\Repeater();

require plugin_dir_path(__FILE__) . 'fields/cggowl-core.php';
require plugin_dir_path(__FILE__) . 'fields/cggowl-content.php';
require plugin_dir_path(__FILE__) . 'fields/cggowl-image.php';
require plugin_dir_path(__FILE__) . 'fields/cggowl-button.php';
require plugin_dir_path(__FILE__) . 'fields/cggowl-metadata.php';
require plugin_dir_path(__FILE__) . 'fields/cggowl-metasingle.php';
require plugin_dir_path(__FILE__) . 'fields/cggowl-price.php';
require plugin_dir_path(__FILE__) . 'fields/cggowl-shortcode.php';
require plugin_dir_path(__FILE__) . 'fields/cggowl-title.php';
require plugin_dir_path(__FILE__) . 'fields/cggowl-html.php';
require plugin_dir_path(__FILE__) . 'fields/cggowl-common.php';

$this->start_controls_tabs('cggowl_columntabs');

$this->start_controls_tab(
    'cggowl_column_1',
    [
        'label' => esc_html__('Column 1 Content', 'cggowl'),
    ]
);

$this->add_control(
    'cggowl_field_gen',
    [
        'label'       => esc_html__('carousel Layout', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::REPEATER,
        'fields'      => $cggowl_repeatercarousel->get_controls(),
        'default'     => [
            [
                'field_type' => 'title',
            ],
            [
                'field_type' => 'content',
            ],
        ],
        'title_field' => '{{{ field_type }}}',
    ]
);

$this->end_controls_tab();

$this->start_controls_tab(
    'cggowl_column_2',
    [
        'label'     => esc_html__('Column 2 Content', 'cggowl'),
        'condition' => [
            'cggowl_layout' => ['grid'],
        ],
    ]
);

$this->add_control(
    'cggowl_field_gen2',
    [
        'label'       => esc_html__('Grid Layout2', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::REPEATER,
        'fields'      => $cggowl_repeatercarousel->get_controls(),
        'default'     => [
            [
                'field_type' => 'title',
            ],
            [
                'field_type' => 'content',
            ],
        ],
        'title_field' => '{{{ field_type }}}',
    ]
);
$this->end_controls_tab();

$this->end_controls_tabs();


$this->end_controls_section();
