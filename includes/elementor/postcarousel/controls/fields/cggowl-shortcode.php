<?php
if (!defined('ABSPATH')) {
    exit;
}
$cggowl_repeatercarousel->add_control(
    'field_shortcode',
    [
        'label'     => esc_html__('Shortcode with brackets', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::TEXT,
        'condition' => [
            'field_type' => 'shortcode',
        ],
    ]
);

$cggowl_repeatercarousel->add_control(
    'field_shortcode_elementor',
    [
        'label'     => esc_html__('Elementor Template ID', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::NUMBER,
        'description'  => esc_html__('Note is Elementor Pro Only Feature, if page template shortcode is [elementor-template id="736"] then its ID is 736', 'cggowl'),
        'condition' => [
            'field_type' => 'shortcode_elementor_pro',
        ],
    ]
);
