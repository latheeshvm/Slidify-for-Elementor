<?php
if (!defined('ABSPATH')) {
  exit;
}

$cggowl_repeatercarousel->add_control(
  'button_field_type',
  [
    'label'     => esc_html__('Button Field Type', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::SELECT,
    'default'   => 'linktopost',
    'options'   => [
      'linktopost'        => esc_html__('Link to post', 'cggowl'),
      'customfieldurlacfdonwload' => esc_html__('ACF File | On click Download file', 'cggowl'),
      'customfieldurlacf' => esc_html__('ACF | Link to Custom field url', 'cggowl'),
      'woocommercecart'   => esc_html__('WooCommerce add to cart button','cggowl'),
    ],
    'condition' => [
      'field_type' => 'button',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'customfieldurl_gen',
  [
    'label'       => esc_html__('Custom Field Name', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::SELECT,
    'options'   => $this->get_acf_list(),
    'description' => esc_html__('Note : the field should return a image url', 'cggowl'),
    'condition'   => [
      'field_type'        => 'button',
      'button_field_type' => ['customfieldurlacfdonwload','customfieldurlacf'],
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'button_field_type_text',
  [
    'label'     => esc_html__('Button Text', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::TEXT,
    'default'   => esc_html__('Read More', 'cggowl'),
    'condition' => [
      'field_type' => 'button',
    ],
  ]
);
