<?php
if (!defined('ABSPATH')) {
  exit;
}

$cggowl_repeatercarousel->add_control(
  'field_html',
  [
    'label'     => esc_html__('Custom HTML', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::CODE,
    'language'  => 'html',
    'rows'      => 5,
    'condition' => [
      'field_type' => 'html',
    ],
  ]
);
