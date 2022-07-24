<?php
if (!defined('ABSPATH')) {
  exit;
}
$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_show_date',
  [
      'label'        => esc_html__('Show Date', 'cggowl'),
      'type'         => \Elementor\Controls_Manager::SWITCHER,
      'label_on'     => esc_html__('Show', 'cggowl'),
      'label_off'    => esc_html__('Hide', 'cggowl'),
      'return_value' => 'yes',
      'default'      => 'yes',
      'condition'    => [
          'field_type' => 'metadata',
      ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_show_tags',
  [
      'label'        => esc_html__('Show Tags', 'cggowl'),
      'type'         => \Elementor\Controls_Manager::SWITCHER,
      'label_on'     => esc_html__('Show', 'cggowl'),
      'label_off'    => esc_html__('Hide', 'cggowl'),
      'return_value' => 'yes',
      'default'      => 'yes',
      'condition'    => [
          'field_type' => 'metadata',
      ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_show_taxonomy',
  [
      'label'        => esc_html__('Show Category/ Taxonomy', 'cggowl'),
      'type'         => \Elementor\Controls_Manager::SWITCHER,
      'label_on'     => esc_html__('Show', 'cggowl'),
      'label_off'    => esc_html__('Hide', 'cggowl'),
      'return_value' => 'yes',
      'default'      => 'yes',
      'condition'    => [
          'field_type' => 'metadata',
      ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_show_author',
  [
      'label'        => esc_html__('Show Author', 'cggowl'),
      'type'         => \Elementor\Controls_Manager::SWITCHER,
      'label_on'     => esc_html__('Show', 'cggowl'),
      'label_off'    => esc_html__('Hide', 'cggowl'),
      'return_value' => 'yes',
      'default'      => 'yes',
      'condition'    => [
          'field_type' => 'metadata',
      ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_show_comment',
  [
      'label'        => esc_html__('Show Comment', 'cggowl'),
      'type'         => \Elementor\Controls_Manager::SWITCHER,
      'label_on'     => esc_html__('Show', 'cggowl'),
      'label_off'    => esc_html__('Hide', 'cggowl'),
      'return_value' => 'yes',
      'default'      => 'yes',
      'condition'    => [
          'field_type' => 'metadata',
      ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_select_taxonomy',
  [
      'label'     => esc_html__('Select Taxonomy', 'cggowl'),
      'type'      => \Elementor\Controls_Manager::SELECT,
      'default'   => 'category',
      'options'   => $cggowl_taxonomy_tax_mata,
      'condition' => [
          'field_type' => 'metadata',
      ],
  ]
);
