<?php
//selection of posts
$this->start_controls_section(
    'content_section_cggowl_content',
    [
        'label' => esc_html__('Type, Order and Filtering', 'cggowl'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$this->add_control(
    'posttype',
    [
        'label'    => esc_html__('Post Type', 'cggowl'),
        'type'     => \Elementor\Controls_Manager::SELECT2,
        'default'  => 'post',
        'label_block'=>true,
        'multiple' => true,
        'options'  => $cggowl_custompostype_array
        ,
    ]
);

$this->add_control(
    'post_type_status',
    [
        'label'    => esc_html__('Post Status', 'cggowl'),
        'type'     => \Elementor\Controls_Manager::SELECT2,
        'multiple' => true,
        'label_block'=>true,
        'default'  => 'publish',
        'options'  => $cggowl_post_status_array,
    ]
);

$this->add_control(
			'cggowl_offset_post',
			[
				'label' => __( 'Offset', 'cgggowl' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
			]
		);

$this->add_control(
    'password_protected',
    [
        'label'        => esc_html__('Show password Protected Posts', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('Show', 'cggowl'),
        'label_off'    => esc_html__('Hide', 'cggowl'),
        'return_value' => 'true',
        'default'      => '',
    ]
);

$this->add_control(
    'order',
    [
        'label'    => esc_html__('Order', 'cggowl'),
        'type'     => \Elementor\Controls_Manager::SELECT,
        'default'  => 'ASC',
        'multiple' => true,
        'options'  => [
            'ASC'  => esc_html__('Ascending ', 'cggowl'),
            'DESC' => esc_html__('Descending ', 'cggowl'),
        ],
    ]
);

$this->add_control(
    'orderby',
    [
        'label'    => esc_html__('Order By', 'cggowl'),
        'type'     => \Elementor\Controls_Manager::SELECT,
        'multiple' => true,
        'default'  => 'none',
        'options'  => [
            'none'           => esc_html__('No Order', 'cggowl'),
            'ID'             => esc_html__('Order by Post ID', 'cggowl'),
            'date'           => esc_html__('Order by Date', 'cggowl'),
            'author'         => esc_html__('Order by Author', 'cggowl'),
            'title'          => esc_html__('Order by Title', 'cggowl'),
            'type'           => esc_html__('Order by Post type', 'cggowl'),
            'modified'       => esc_html__('Order by Last Modified', 'cggowl'),
            'parent'         => esc_html__('Order by Post/Page parent', 'cggowl'),
            'rand'           => esc_html__('Random', 'cggowl'),
            'comment_count'  => esc_html__('Order by Comment Count', 'cggowl'),
            'relevance'      => esc_html__('By relevence', 'cggowl'),
            'menu_order'     => esc_html__('Order by Page Order', 'cggowl'),
            'meta_value'     => esc_html__('Order by Meta Value', 'cggowl'),
            'meta_value_num' => esc_html__('Order by Numeric Meta Value ', 'cggowl'),
        ],
    ]
);

$this->add_control(
    'sortingbymetakey',
    [
        'label'     => esc_html__('Meta Key', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => '',
        'options'   => $cggowl_post_key_list,
        'condition' => [
            'orderby' => ['meta_value', 'meta_value_num'],
        ],
    ]
);

$this->add_control(
    'sortingbymetavalue',
    [
        'label'       => esc_html__('Meta Value', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'default'     => '',
        'placeholder' => esc_html__('Type meta value here', 'cggowl'),
        'condition'   => [
            'orderby' => ['meta_value', 'meta_value_num'],
        ],
    ]
);

$this->add_control(
    'meta_compare',
    [
        'label'     => esc_html__('Meta Compare', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => '',
        'options'   => [
            ''            => esc_html__('None', 'cggowl'),
            '='           => esc_html__('Equal to', 'cggowl'),
            '!='          => esc_html__('Not Equal to', 'cggowl'),
            '>'           => esc_html__('Greater than', 'cggowl'),
            '>='          => esc_html__('Greater than or equal to', 'cggowl'),
            '<'           => esc_html__('Less Than', 'cggowl'),
            '<='          => esc_html__('Less Than or equal to', 'cggowl'),
            'LIKE'        => esc_html__('LIKE', 'cggowl'),
            'NOT LIKE'    => esc_html__('NOT LIKE', 'cggowl'),
            'IN'          => esc_html__('IN', 'cggowl'),
            'NOT IN'      => esc_html__('NOT IN', 'cggowl'),
            'BETWEEN'     => esc_html__('BETWEEN', 'cggowl'),
            'NOT BETWEEN' => esc_html__('NOT BETWEEN', 'cggowl'),
            'NOT EXISTS'  => esc_html__('NOT EXISTS', 'cggowl'),
            'REGEXP'      => esc_html__('NOT REGEXP', 'cggowl'),
            'RLIKE'       => esc_html__('RLIKE', 'cggowl'),
        ],
        'condition' => [
            'orderby' => 'meta_value',
        ],
    ]
);

$this->add_control(
    'oneauthor',
    [
        'label'       => esc_html__('Show Posts for specific Authors', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'description' => esc_html__('This can be used to show specific posts from an author or multiple authors. Add comma seperated author IDs to display posts.
                                        To exclude any specific author put a negative sign infront of the id', 'cggowl'),
        'language'    => 'text',
    ]
);

$this->add_control(
    'cggowl_cat_terms_select',
    [
        'label'    => esc_html__('Select Category Term', 'cggowl'),
        'type'     => \Elementor\Controls_Manager::SELECT2,
        'multiple' => true,
        'label_block'=>true,
        'options'  => $cggowl_taxonomy_array,
    ]
);

$this->add_control(
    'cggowl_exclude_terms',
    [
        'label'    => esc_html__('Exclude Category Term', 'cggowl'),
        'type'     => \Elementor\Controls_Manager::SELECT2,
        'multiple' => true,
        'label_block'=>true,
        'options'  => $cggowl_taxonomy_array,
    ]
);

$this->add_control(
    'cggowl_tag_terms_select',
    [
        'label'    => esc_html__('Select Tag Term', 'cggowl'),
        'type'     => \Elementor\Controls_Manager::SELECT2,
        'multiple' => true,
        'label_block'=>true,
        'options'  => $cggowl_taxonomy_tag_array,
    ]
);
$this->add_control(
    'cggowl_exclude__tag_terms',
    [
        'label'    => esc_html__('Exclude Tag Term', 'cggowl'),
        'type'     => \Elementor\Controls_Manager::SELECT2,
        'multiple' => true,
        'label_block'=>true,
        'options'  => $cggowl_taxonomy_tag_array,
    ]
);

$this->add_control(
    'enable_tax_query',
    [
        'label'        => esc_html__('Enable Tax Query', 'cggowl'),
        'type'         => \Elementor\Controls_Manager::SWITCHER,
        'label_on'     => esc_html__('No', 'cggowl'),
        'label_off'    => esc_html__('Yes', 'cggowl'),
        'return_value' => 'no',
        'default'      => '',
    ]
);

$this->add_control(
    'cggowl_tax_selector_relation',
    [
        'label'     => esc_html__('Select Relation', 'cggowl'),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => 'AND',
        'options'   => [
            'AND' => esc_html__('AND', 'cggowl'),
            'OR'  => esc_html__('OR', 'cggowl'),
        ],
        'condition' => [
            'enable_tax_query' => 'no',
        ],
    ]
);

$cggowl_repeater = new \Elementor\Repeater();

$cggowl_repeater->add_control(
    'taxonomy',
    [
        'label'   => esc_html__('Select Taxonomy', 'cggowl'),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'options' => $cggowl_taxonomy_repeat_tax,
    ]
);

$cggowl_repeater->add_control(
    'terms',
    [
        'label'    => esc_html__('Select Terms', 'cggowl'),
        'type'     => \Elementor\Controls_Manager::SELECT2,
        'multiple' => true,
        'label_block'=>true,
        'options'  => $cggowl_taxonomy_repeat_term,
    ]
);

$this->add_control(
    'cggowl_repeater_term_chooser_field',
    [
        'label'       => esc_html__('Taxonomy List', 'cggowl'),
        'type'        => \Elementor\Controls_Manager::REPEATER,
        'fields'      => $cggowl_repeater->get_controls(),
        'title_field' => '{{{ taxonomy }}}',
        'condition'   => [
            'enable_tax_query' => 'no',
        ],
    ]
);

$this->end_controls_section();

// Author Control
