<?php
if (!defined('ABSPATH')) {
  exit;
}
$cggowl_repeatercarousel->add_control(
  'field_content_type',
  [
    'label'     => esc_html__('Content type', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::SELECT,
    'default'   => 'editor',
    'options'   => [
      'editor'          => esc_html__('Editor Content', 'cggowl'),
      'customfield_acf' => esc_html__('ACF Custom Field', 'cggowl'),
      'customfield'     => esc_html__('Custom Field', 'cggowl'),
    ],
    'condition' => [
      'field_type' => ['content'],
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'field_content_custom_value_acf',
  [
    'label'     => esc_html__('Custom field name', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::TEXT,
    'condition' => [
      'field_type'         => ['content'],
      'field_content_type' => ['customfield'],
    ],
  ]
);


$cggowl_repeatercarousel->add_control(
  'field_content_type_acf',
  [
    'label'     => esc_html__('ACF Field Selector', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::SELECT,
    'options'   => $this->get_acf_list(),
    'condition' => [
      'field_type'         => ['content'],
      'field_content_type' => ['customfield_acf'],
    ],
  ]
);


$cggowl_repeatercarousel->add_control(
  'trim_content',
  [
    'label'        => esc_html__('Enable Excerpt mode', 'cggowl'),
    'type'         => \Elementor\Controls_Manager::SWITCHER,
    'label_on'     => esc_html__('Enable', 'cggowl'),
    'label_off'    => esc_html__('Disbale', 'cggowl'),
    'return_value' => 'yes',
    'default'      => 'yes',
    'condition'    => [
      'field_type' => ['content'],
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'excerpt_length',
  [
    'label'     => esc_html__('Word Count', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::NUMBER,
    'default'   => 30,
    'condition' => [
      'field_type' => ['content'],
    ],
  ]
);
