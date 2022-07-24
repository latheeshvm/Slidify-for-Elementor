<?php
$cggowl_repeatercarousel->add_control(
  'cggowl_meta_to_load',
  [
    'label'   => __('Meta to Load', 'cggowl'),
    'type'    => \Elementor\Controls_Manager::SELECT,
    'default' => 'author',
    'options' => [
      'author'       => __('Author', 'cggowl'),
      'taxonomy'     => __('Taxonomy', 'cggowl'),
      'date'         => __('Date', 'cggowl'),
      'commentcount' => __('Comment Count', 'cggowl'),
    ],
    'condition' => [
      'field_type' => 'metadatasingle',
    ],
  ]
);


$cggowl_txon_array  = $this->cggowl_meta_data_retrievier_taxonomy();

$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_taxonmomny_array',
  [
    'label'     => __('Select Taxonomy', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::SELECT,
    'default'   => 'category',
    'options'   => $cggowl_txon_array,
    // 'condition' => ['cggowl_meta_to_load' => 'taxonomy'],
    'condition' => [
      'field_type' => 'metadatasingle',
      'cggowl_meta_to_load' => 'taxonomy',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_count',
  [
    'label'     => __('Number of terms to load', 'cggowl'),
    'type'      => \Elementor\Controls_Manager::NUMBER,
    'default'   => 10,
    'condition' => [
      'field_type' => 'metadatasingle',
      'cggowl_meta_to_load' => 'taxonomy',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_load_links',
  [
    'label'        => __('Show As Links', 'cggowl'),
    'type'         => \Elementor\Controls_Manager::SWITCHER,
    'label_on'     => __('Yes', 'cggowl'),
    'label_off'    => __('No', 'cggowl'),
    'return_value' => 'yes',
    'default'      => 'no',
    'condition' => [
      'field_type' => 'metadatasingle',
      'cggowl_meta_to_load' => 'taxonomy',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_childless',
  [
    'label'        => __('Childless?', 'cggowl'),
    'type'         => \Elementor\Controls_Manager::SWITCHER,
    'label_on'     => __('Yes', 'cggowl'),
    'label_off'    => __('No', 'cggowl'),
    'return_value' => 'yes',
    'default'      => 'no',
    'condition' => [
      'field_type' => 'metadatasingle',
      'cggowl_meta_to_load' => 'taxonomy',
    ],
  ]
);

$cggowl_repeatercarousel->add_control(
  'cggowl_metadata_hirarachical',
  [
    'label'        => __('Hierarchical?', 'cggowl'),
    'type'         => \Elementor\Controls_Manager::SWITCHER,
    'label_on'     => __('Yes', 'cggowl'),
    'label_off'    => __('No', 'cggowl'),
    'return_value' => 'yes',
    'default'      => 'yes',
    'condition' => [
      'field_type' => 'metadatasingle',
      'cggowl_meta_to_load' => 'taxonomy',
    ],
  ]
);
