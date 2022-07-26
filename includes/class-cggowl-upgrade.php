<?php

namespace CGGOWLCORENSUPG {

    if (!defined('ABSPATH')) {
        exit;
    }

    class CggowlUpg
    {
        protected $cggowl_version;

        public function __construct()
        {
            if (defined('CGGOWL_VERSION')) {
                $this->cggowl_version = CGGOWL_VERSION;
            } else {
                $this->cggowl_version = '1.0.0';
            }
        }

        /*
        ID: CGGOWL-1
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class : Returns list of post types
         */
        public function cggowl_list_of_posttypes()
        {
            $args = array(
                'public' => true,
            );

            $output   = 'names'; // 'names' or 'objects' (default: 'names')
            $operator = 'and'; // 'and' or 'or' (default: 'and')

            $post_types = get_post_types($args, $output, $operator);
            $post_types = array_map('ucfirst', $post_types);
            return $post_types;
        }

        /*
        ID: CGGOWL-2
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class : Returns list of post Taxonomy
         */
        public function cggowl_list_of_taxonomy()
        {
            $args = array(
                'public'   => true,
                '_builtin' => true,
            );
            $tax_list = get_taxonomies($args);
            return $tax_list;
        }

        /*
        ID: CGGOWL-3
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class : Generates the list of all taxonomy - Used in taxonomy
         */
        public function cggowl_list_of_taxonomy_repeater_field()
        {
            $tax_list = get_taxonomies();
            return $tax_list;
        }

        /*
        ID: CGGOWL-4
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class : Generates the list of terms for the all the category
         */
        public function cggowl_list_of_terms()
        {
            //$tax = $this->cggowl_list_of_taxonomy();
            $terms = get_terms(array('taxonomy' => 'category'));
            $lat = array();
            foreach ($terms as $key => $term) {
                $lat[$term->term_taxonomy_id] = $term->name;
            }
            return $lat;
        }

        /*
        ID: CGGOWL-5
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class : Generates the list of terms for the all the category - Used in repeater
         */
        public function cggowl_list_of_terms_repeater_field()
        {
            $tax   = $this->cggowl_list_of_taxonomy_repeater_field();
            $terms = get_terms(array('taxonomy' => $tax));
            $lat = array();
            foreach ($terms as $key => $term) {
                $lat[$term->term_taxonomy_id] = $term->name;
            }
            return $lat;
        }

        /*
        ID: CGGOWL-6
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :Generates the list of terms for the all the the_terms
         */
        public function cggowl_list_of_tags()
        {
            $tax   = $this->cggowl_list_of_taxonomy();
            $terms = get_tags();
            $lat2 =array();
            foreach ($terms as $key => $term) {
                $lat2[$term->term_taxonomy_id] = $term->name;
            }
            return $lat2;
        }

        /*
        ID: CGGOWL-7
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  convert the meta value to array if comma exits other wise string
         */
        public function cggowl_mata_value_gen($cggowl_u_meta_value)
        {
            $searchString = ',';
            if (strpos($cggowl_u_meta_value, $searchString) !== false) {
                $cggowl_u_meta_value = explode(",", $cggowl_u_meta_value);
            } else {
                $cggowl_u_meta_value = $cggowl_u_meta_value;
            }
            return $cggowl_u_meta_value;
        }

        /*
        ID: CGGOWL-8
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Collects ids of all the post types, then getpost to collect the IDs, Then returns the key array
         */
        public function cggowl_custom_post_type_keylist()
        {
            $cggowl_custompostype_array = $this->cggowl_list_of_posttypes();
            $cggowl_getposts            = array();
            foreach ($cggowl_custompostype_array as $value) {
                $args = array(
                    'numberposts' => 1,
                    'post_type'   => $value,
                );
                if (!empty(get_posts($args)[0]->ID)) {
                    $cggowl_getposts[] = get_posts($args)[0]->ID;
                }
            }
            $new_array = array();
            foreach ($cggowl_getposts as $value) {
                $new_array[] = get_post_custom($value);
            }

            $result = array();
            foreach ($new_array as $sub) {
                $result = array_merge($result, $sub);
            }
            $result     = array_keys($result);
            $result     = array_unique($result);
            $result     = array_combine($result, $result);
            $result[''] = 'NONE';
            return $result;
        }

        /*
        ID: CGGOWL-8
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Collects ids of all the post types, then getpost to collect the IDs, Then returns the key array
         */
        public function cggowl_catergory_id_generator($cggowl_u_catid, $cggowl_u_catidexclude)
        {
            if (is_array($cggowl_u_catid)) {
                $cggowl_u_catid = implode(", ", $cggowl_u_catid);
            } else {
                $cggowl_u_catid = '';
            }
            $cggowl_u_catidexcluder = array();
            if (is_array($cggowl_u_catidexclude)) {
                $cggowl_u_catidexclude = array_map('intval', $cggowl_u_catidexclude);

                foreach ($cggowl_u_catidexclude as $value) {
                    $cggowl_u_catidexcluder[] = -1 * $value;
                }
            }
            if (is_array($cggowl_u_catidexcluder)) {
                $cggowl_u_catidexcluder = implode(",", $cggowl_u_catidexcluder);
            } else {
                $cggowl_u_catidexcluder = '';
            }

            if ($cggowl_u_catidexcluder != '') {
                $cggowl_cat_exculution = ',' . $cggowl_u_catidexcluder;
            } else {
                $cggowl_cat_exculution = $cggowl_u_catidexcluder;
            }
            $cggowl_u_catid2 = $cggowl_u_catid . $cggowl_cat_exculution;
            return $cggowl_u_catid2;
        }

        /*
        ID: CGGOWL-9
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Get the post status as list
         */
        public function cggowl_list_of_post_status()
        {
            $post_stat = get_post_stati();
            return $post_stat;
        }

        /*
        ID: CGGOWL-9
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  This is the main argument generator for the wp query
         */
        public function cggowl_args_generator($settings)
        {

          //Post Type
            $cggowl_u_posttype   = $settings['posttype'];
            $cggowl_u_poststatus = $settings['post_type_status'];
            //$cggowl_u_postpagingenable = $settings['post_enable_pagination'];
            $cggowl_u_paginate_num = $settings['post_count'];
            $cggowl_u_password     = $settings['password_protected'];

            //Ordering
            $cggowl_u_order    = $settings['order'];
            $cggowl_u_orderby  = $settings['orderby'];
            $cggowl_u_meta_key = $settings['sortingbymetakey'];

            $cggowl_u_meta_value   = $settings['sortingbymetavalue'];
            $cggowl_u_meta_value   = $this->cggowl_mata_value_gen($cggowl_u_meta_value);
            $cggowl_u_meta_compare = $settings['meta_compare'];

            //Author
            $cggowl_u_authorid = $settings['oneauthor'];

            //Category Arg Creator
            $cggowl_u_catid        = $settings['cggowl_cat_terms_select'];
            $cggowl_u_catidexclude = $settings['cggowl_exclude_terms'];
            $cggowl_u_catid        = $this->cggowl_catergory_id_generator($cggowl_u_catid, $cggowl_u_catidexclude);

            //tag arg creator
            $cggowl_u_tagid         = $settings['cggowl_tag_terms_select'];
            $cggowl_u_tagid_exclude = $settings['cggowl_exclude__tag_terms'];

            //taxonomy arg creator
            $cggowl_u_tax_relation          = $settings['cggowl_tax_selector_relation'];
            $cggowl_u_tax_array             = $settings['cggowl_repeater_term_chooser_field'];
            $cggowl_u_tax_array["relation"] = $cggowl_u_tax_relation;

            //offset
            $cggowl_u_offset = $settings['cggowl_offset_post'];

            $cggowl_enable_taxquery = $settings['enable_tax_query'];

            //the field generrator
            $cggowl_field_gen = $settings['cggowl_field_gen'];
            $cggowl_field_gen = $this->cggowl_ren_func_repeater_to_array($cggowl_field_gen);


            $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

            $cggowl_args = array(
                'post_type'      => $cggowl_u_posttype,
                'post_status'    => $cggowl_u_poststatus, //post_type_status
                // 'paged'          => $paged,
                // 'nopaging'       => $cggowl_u_postpagingenable, //post_enable_pagination
                'posts_per_page' => $cggowl_u_paginate_num, //post_count
                'has_password'   => $cggowl_u_password, //password_protected
                'order'          => $cggowl_u_order, //order
                'orderby'        => $cggowl_u_orderby, //orderby
                'meta_query'     => array(
                    array(
                        'key'     => $cggowl_u_meta_key,
                        'value'   => $cggowl_u_meta_value,
                        'compare' => $cggowl_u_meta_compare, //meta_compare
                    ),
                ),
                'meta_key'       => $cggowl_u_meta_key, //sortingbymetakey
                'author'         => $cggowl_u_authorid,
                'cat'            => $cggowl_u_catid,
                'tag__in'        => $cggowl_u_tagid,
                'tag__not_in'    => $cggowl_u_tagid_exclude,
                'tax_query'      => $cggowl_u_tax_array,
                'offset'         => $cggowl_u_offset,
            );

            if ($cggowl_u_orderby == 'meta_value_num') {
                unset($cggowl_args['meta_query']);
            } elseif ($cggowl_u_orderby != 'meta_value') {
                unset($cggowl_args['meta_query']);
                unset($cggowl_args['meta_key']);
            }
            if ($cggowl_enable_taxquery != 'no') {
                unset($cggowl_args['tax_query']);
            }
            $cggowl_args = array_filter($cggowl_args);

            if ($settings['cgggowl_enable_lazy_load'] == 'yes') {
                $cggowl_append_data = 'data-';
            } else {
                $cggowl_append_data = '';
            }

            return apply_filters('cggowl_args_generator_hook', $cggowl_args);
        }

        /*
        ID: CGGOWL-10
        Apply filter provided - CGGOWL AP1
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Renders the title of the post safer
         */
        public function cggowl_ren_title()
        {
            $title = the_title_attribute('echo=0');
            return apply_filters('cggowl_ren_title_hook', $title);
        }

        /*
        ID: CGGOWL-11
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  This returns the url of the image when used
         */
        public function cggowl_ren_image($adv_settings, $cggowl_img_type, $cggowl_img_id, $cggowl_img_type_size, $cggowl_img_custom)
        {
            switch ($cggowl_img_type) {
                case "featured":
                    $imageurl_before = get_post_thumbnail_id($cggowl_img_id);
                    $imageurl_url = wp_get_attachment_url($imageurl_before);
                    $extra= array(
                      'url'=> $imageurl_url,
                      'id'=> $imageurl_before,
                    );

                    $imageurl =  \Elementor\Cggowl_Featured_Image_Getter::get_attachment_image_html_generator($imageurl_before, $adv_settings, $image_size_key = 'image', $image_key = null, $extra);

                    if (empty($imageurl)) {
                        $imageurl_before = $adv_settings['image']['id'];
                        if (!empty($imageurl_before)) {
                            $imageurl =  \Elementor\Cggowl_Featured_Image_Getter::get_attachment_image_html_generator($imageurl_before, $adv_settings, $image_size_key = 'image', $image_key = null, $extra);
                        }
                    }
                    return $imageurl;
                    break;
                case "acf_image":
                    if (!class_exists('acf')) {
                        return 'ACF Not Active';
                    }
                    $imageurl_before = get_field($cggowl_img_custom, $cggowl_img_id);
                    $imageurl_url = wp_get_attachment_url($imageurl_before);
                    $extra= array(
                      'url'=> $imageurl_url,
                      'id'=> $imageurl_before,
                    );
                    $imageurl =  \Elementor\Cggowl_Featured_Image_Getter::get_attachment_image_html_generator($imageurl_before, $adv_settings, $image_size_key = 'image', $image_key = null, $extra);

                    if (empty($imageurl)) {
                        $imageurl_before = $adv_settings['image']['id'];
                        if (!empty($imageurl_before)) {
                            $imageurl =  \Elementor\Cggowl_Featured_Image_Getter::get_attachment_image_html_generator($imageurl_before, $adv_settings, $image_size_key = 'image', $image_key = null, $extra);
                        }
                    }
                    return $imageurl;
                    break;
                case "custom_field":
                    $imageurl_cus = get_post_meta($cggowl_img_id, $cggowl_img_custom, true);
                    $imageurl_cus = wp_get_attachment_image_src($imageurl_cus, $cggowl_img_type_size);
                    return $imageurl_cus;
                    break;
                case "woocommerce_image":
                    if (!class_exists('WooCommerce')){
                        return 'WooCommerce Not Active';
                    }
                    $imageurl_cus = wp_get_attachment_image_src(get_post_thumbnail_id($cggowl_img_id), $cggowl_img_type_size);
                    $imageurl_cus = $imageurl_cus[0];
                    return $imageurl_cus;
                    break;
                default:
                    $imageurl = get_the_post_thumbnail_url($cggowl_img_id, $cggowl_img_type_size);
                    return $imageurl;

            }
        }

        /*
        ID: CGGOWL-12
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  This decides the content for the content selector
         */
        public function cggowl_ren_content($cggowl_gloabal_id, $cggowl_field_gen, $cggowl_key)
        {
            $cggowl_cont_id = $cggowl_gloabal_id;
            $cggowl_r_content_type   = $cggowl_field_gen[$cggowl_key]['field_content_type'];
            $cggowl_r_enable_excerpt = $cggowl_field_gen[$cggowl_key]['trim_content'];
            $cggowl_excerpt_len = $cggowl_field_gen[$cggowl_key]['excerpt_length'];
            if ($cggowl_r_content_type == 'customfield_acf') {
                $cggowl_r_fieldname = $cggowl_field_gen[$cggowl_key]['field_content_type_acf'];
            } else {
                $cggowl_r_fieldname = $cggowl_field_gen[$cggowl_key]['field_content_custom_value_acf'];
            }
            switch ($cggowl_r_content_type) {
                case "editor":
                    $content = get_the_content();
                    if ($cggowl_r_enable_excerpt == 'yes') {
                        $content = wp_trim_words($content, $cggowl_excerpt_len, '...');
                        return $content;
                    } else {
                        return $content;
                    }
                    break;
                case "customfield_acf":
                    if (!class_exists('acf')) {
                        return 'ACF Not Active';
                    }
                    $content = get_field($cggowl_r_fieldname);
                    if ($cggowl_r_enable_excerpt == 'yes') {
                        $content = wp_trim_words($content, $cggowl_excerpt_len, '...');
                        return $content;
                    } else {
                        return $content;
                    }
                    break;
                case 'customfield':
                    $post_id = $cggowl_cont_id;
                    $key     = $cggowl_r_fieldname;
                    $single  = true;

                    $content = get_post_meta($post_id, $key, $single);
                    if (is_array($content)) {
                        return " ";
                    }
                    if ($cggowl_r_enable_excerpt == 'yes') {
                        $content = wp_trim_words($content, $cggowl_excerpt_len, '...');
                        return $content;
                    } else {
                        return $content;
                    }
                    break;

                default:
                    $content = the_content();
                    if ($cggowl_r_enable_excerpt == 'yes') {
                        $content = wp_trim_words($content, $cggowl_excerpt_len, '...');
                        return $content;
                    } else {
                        return $content;
                    }

            }
        }

        /*
        ID: CGGOWL-13
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  This decides the content for the button selector
         */
        public function cggowl_ren_button($cggowl_r_id, $cggowl_r_buttonfieldtype, $cggowl_r_customfieldname)
        {
            switch ($cggowl_r_buttonfieldtype) {
                case "linktopost":
                    $url = get_permalink();
                    return $url;
                    break;
                case "customfieldurl":

                    $post_id = $cggowl_r_id;
                    $key     = $cggowl_r_customfieldname;
                    $single  = true;
                    $url     = get_post_meta($post_id, $key, $single);
                    return $url;
                    break;
                case "customfieldurlacf":
                    if (class_exists('acf')) {
                        $url = get_field($cggowl_r_customfieldname);
                        return $url;
                    }
                    break;
                case "customfieldurlacfdonwload":
                    if (class_exists('acf')) {
                        $url = get_field($cggowl_r_customfieldname);
                        if(!empty($url)){
                          return $url['url'];
                        }else{
                          return;
                        }
                        break;
                    }
                    // no break
                default:
                    $url = get_permalink();
                    return $url;
            }
        }

        /*
        ID: CGGOWL-14
        Since ver 1.1.0
        Modified By : LatGameDev
        Purpose of the function/class :  This decides the content for the metadata selector
         */
        public function cggowl_ren_metadata($cggowl_global_id, $cggowl_field_gen, $cggowl_key)
        {
            //$cggowl_m_id, $cggowl_m_en_date, $cggowl_m_en_tags, $cggowl_m_en_tax, $cggowl_m_en_auth, $cggowl_m_en_comm, $cggowl_m_taxvalue
            $cggowl_m_id = $cggowl_global_id;
            $cggowl_m_en_date  = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_show_date'];
            $cggowl_m_en_tags  = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_show_tags'];
            $cggowl_m_en_tax   = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_show_taxonomy'];
            $cggowl_m_en_auth  = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_show_author'];
            $cggowl_m_en_comm  = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_show_comment'];
            $cggowl_m_taxvalue = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_select_taxonomy'];

            if ($cggowl_m_en_date == 'yes') {
                $cggowl_date = get_the_date();
            } else {
                $cggowl_date = '';
            }

            //check for woocommerce product type is introduced  verion 1.1.0
            if (($cggowl_m_en_tags == 'yes') && (get_post_type($cggowl_m_id) == 'product')) {
                $cggowl_tag = get_the_term_list($cggowl_m_id, 'product_tag', '', ', ');
            } elseif ($cggowl_m_en_tags == 'yes') {
                $cggowl_tag = get_the_tag_list("", $sep = ", ");
            } else {
                $cggowl_tag = '';
            }

            //check for woocommerce product type is introduced  versio 1.1.0
            if (($cggowl_m_en_tax == 'yes') && (get_post_type($cggowl_m_id) == 'product')) {
                $cggowl_tax = get_the_term_list($cggowl_m_id, 'product_cat', '', ', ');
            } elseif ($cggowl_m_en_tax == 'yes') {
                $cggowl_tax = get_the_term_list($cggowl_m_id, $cggowl_m_taxvalue, '', ', ');
            } else {
                $cggowl_tax = '';
            }

            if ($cggowl_m_en_auth == 'yes') {
                $cggowl_auth = get_the_author_meta('display_name');
            } else {
                $cggowl_auth = '';
            }
            if ($cggowl_m_en_comm == 'yes') {
                $cggowl_comm = get_comments_number();
            } else {
                $cggowl_comm = '';
            }

            $cggowl_met_array = array(
                'date' => esc_html(ucwords($cggowl_date)),
                'tag'  => esc_html__('Tags&nbsp;:&nbsp;', 'cggowl') . $cggowl_tag,
                'tax'  => ucwords($cggowl_m_taxvalue) . '&nbsp;:&nbsp;' . $cggowl_tax,
                'auth' => esc_html__('By&nbsp;', 'cggowl') . $cggowl_auth,
                'com'  => $cggowl_comm . esc_html__('&nbsp;Comments', 'cggowl'),
            );

            if (empty($cggowl_tag)) {
                unset($cggowl_met_array['tag']);
            }

            if (empty($cggowl_tax)) {
                unset($cggowl_met_array['tax']);
            }

            if (empty($cggowl_auth)) {
                unset($cggowl_met_array['auth']);
            }
            if (empty($cggowl_comm)) {
                unset($cggowl_met_array['com']);
            }

            $cggowl_met_array = array_filter($cggowl_met_array);
            return $cggowl_met_array;
        }

        /*
        ID: CGGOWL-15
        Apply filter provided -CGGOWL AP2
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  This decides the content for the shortcode selector
         */
        public function cggowl_ren_shortcode($cggowl_shortcode)
        {
            $input = $cggowl_shortcode;
            return apply_filters('cggowl_ren_shortcode_hook', $input);
        }

        /*
        ID: CGGOWL-16
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Function modifed for repeater
         */
        public function cggowl_ren_func_repeater_to_array($cggowl_field_gen)
        {
            $valuescs = $cggowl_field_gen;
            return $valuescs;
        }

        /*
        ID: CGGOWL-17
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Converts the image size array to elemenetor selector array
         */
        public function cggowl_ren_func_array_of_image_size()
        {
            $result = get_intermediate_image_sizes();
            $result = array_unique($result);
            $result = array_combine($result, $result);
            return $result;
        }

        /*
        ID: CGGOWL-18
        Apply filter provided - CGGOWL AP3
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Pagination arguments
         */
        public function cggowl_paginate_args($cggowl_query)
        {
            $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
            $paged = apply_filters('cggowl_paginate_args_paged_hook', $paged);
            $args  = array(
                'format'    => 'page/%#%',
                'current'   => intval($paged),
                'total'     => intval($cggowl_query->max_num_pages),
                'mid_size'  => 2,
                'prev_text' => '<i class="fa fa-arrow-left"></i>',
                'next_text' => '<i class="fa fa-arrow-right"></i>',
            );
            return apply_filters('cggowl_paginate_args_hook', $args);
        }

        /*
        ID: CGGOWL-19
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  background image generator for row;
         */
        public function cggowl_background_image_genenrator($cggowl_b_img_id, $settings)
        {
            $cggowl_b_enable        = $settings['cggowl_make_featured_image_as_background'];
            $cggowl_b_img_type_size = $settings['cggowl_back_featured_image_size'];
            $cggowl_b_top_grad      = $settings['cggowl_b_top_grad'];
            $cggowl_bottom_grad     = $settings['cggowl_b_bottom_grad'];
            $cggowl_b_cover         = $settings['cggowl_b_cover'];
            $cggowl_b_repeat        = $settings['cggowl_b_repeat'];
            $cggowl_b_position      = $settings['cggowl_b_position'];

            $featured_image_url = get_the_post_thumbnail_url($cggowl_b_img_id, $cggowl_b_img_type_size);

            return 'style="background: linear-gradient(' . esc_attr($cggowl_b_top_grad) . ',' . esc_attr($cggowl_bottom_grad) . '),url(' . esc_url($featured_image_url) . '); background-size:cover; background-repeat:no-repeat; background-position:' . esc_html($cggowl_b_position) . ' "';
        }

        /*
        ID: CGGOWL-20
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Security for the html
         */
        public function cggowl_html_allowed_html()
        {
            $allowed_tags = array(
                '&nbsp;'     => array(),
                'a'          => array(
                    'class' => array(),
                    'href'  => array(),
                    'rel'   => array(),
                    'title' => array(),
                ),
                'abbr'       => array(
                    'title' => array(),
                ),
                'b'          => array(),
                'blockquote' => array(
                    'cite' => array(),
                ),
                'cite'       => array(
                    'title' => array(),
                ),
                'code'       => array(),
                'del'        => array(
                    'datetime' => array(),
                    'title'    => array(),
                ),
                'dd'         => array(),
                'div'        => array(
                    'class' => array(),
                    'title' => array(),
                    'style' => array(),
                ),
                'dl'         => array(),
                'dt'         => array(),
                'em'         => array(),
                'h1'         => array(),
                'h2'         => array(),
                'h3'         => array(),
                'h4'         => array(),
                'h5'         => array(),
                'h6'         => array(),
                'i'          => array(),
                'img'        => array(
                    'alt'    => array(),
                    'class'  => array(),
                    'height' => array(),
                    'src'    => array(),
                    'width'  => array(),
                ),
                'li'         => array(
                    'class' => array(),
                ),
                'ol'         => array(
                    'class' => array(),
                ),
                'p'          => array(
                    'class' => array(),
                ),
                'q'          => array(
                    'cite'  => array(),
                    'title' => array(),
                ),
                'span'       => array(
                    'class' => array(),
                    'title' => array(),
                    'style' => array(),
                ),
                'strike'     => array(),
                'strong'     => array(),
                'ul'         => array(
                    'class' => array(),
                ),
            );

            return $allowed_tags;
        }

        /*
        ID: CGGOWL-21
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Returns the variable product price in neat way . Filter provided
         */
        public function cggowl_woocommmerce_variation_price_printer($cggowl_available_variations, $cggowl_price_param, $cggowl_woocommerce_cur)
        {
            $cggowl_pricing_array = array();
            foreach ($cggowl_available_variations as $key => $cggowl_available_variation) {
                $cggowl_pricing_array[] = $cggowl_available_variation[$cggowl_price_param];
            }
            $cggowl_max_price = $cggowl_woocommerce_cur . max($cggowl_pricing_array);
            $cggowl_min_price = $cggowl_woocommerce_cur . min($cggowl_pricing_array);

            $cggowl_price_range = $cggowl_min_price . "&nbsp;-&nbsp;" . $cggowl_max_price;
            return apply_filters('cggowl_variation_price_range_hook', $cggowl_price_range);
        }

        /*
        ID: CGGOWL-22
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Returns the simple and external product price in neat way . Filter provided
         */
        public function cggowl_woocommmerce_simple_price_printer($cggowl_simple_regualar_price, $cggowl_simple_sale_price, $cggowl_woocommerce_cur)
        {
            if ($cggowl_simple_sale_price) {
                $cggowl_price = $cggowl_woocommerce_cur . "<del>" . $cggowl_simple_regualar_price . "</del>&nbsp;" . $cggowl_woocommerce_cur . $cggowl_simple_sale_price;
            } elseif ($cggowl_simple_regualar_price) {
                $cggowl_price = $cggowl_woocommerce_cur . $cggowl_simple_regualar_price;
            } else {
                $cggowl_price = "";
            }
            return apply_filters('cggowl_simple_price_range_hook', $cggowl_price);
        }

        /*
        ID: CGGOWL-23
        Since ver 8.0.0
        Modified By : LatGameDev
        Purpose of the function/class :  Fix for elementor switcher false
         */
        public function cggowl_return_bool($cggowl_func_set)
        {
            if ($cggowl_func_set != 'yes') {
                $cggowl_func_set = false;
                return $cggowl_func_set;
            } else {
                $cggowl_func_set = true;
                return $cggowl_func_set;
            }
        }


        public function cggowl_carousel_settings($settings)
        {
            $cggowl_carousel_settings = array(
              'centeredSlides'            => $this->cggowl_return_bool($settings['cggowl_center_sliders_u']),
              'slidesOffsetBefore'        => $settings['cggowl_offset_before'],
              'slidesOffsetAfter'         => $settings['cggowl_offset_after'],
              'grabCursor'                => $this->cggowl_return_bool($settings['cggowl_grabcursor_u']),
              'direction'                 => $settings['cggowl_direction_u'],
              'loop'                      => $this->cggowl_return_bool($settings['cggowl_loop_u']),
              // 'speed'                     => $settings['cggowl_speed_u'],
              'effect'                    => $settings['cggowl_effect_u'],
              'preloadImages'             => false,
              'lazy'                      => $this->cggowl_return_bool($settings['cgggowl_enable_lazy_load']),
              'desktop_slides_per_veiw'   => $settings['cggowl_carousel_column_dektop'],
              'tablet_slides_per_veiw'    => $settings['cggowl_carousel_column_tablet'],
              'mobile_slides_per_veiw'    => $settings['cggowl_carousel_column_mobile'],
              'pagination_type'           => $settings['cggowl_pagination_type_u'],
              'clickable'                 => $this->cggowl_return_bool($settings['cgggowl_enable_pagination_clickable_u']),
              'dragable'                  => $this->cggowl_return_bool($settings['cgggowl_enable_scrollbar_dragabble_u']),
              'enable_keyboard'           => $this->cggowl_return_bool($settings['cgggowl_enable_keyboard_u']),
              'enable_autoplay'           => $this->cggowl_return_bool($settings['cggowl_autoplay_u']),
              'delay'                     => $settings['cggowl_delay_u'],
              'stopOnLastSlide'           => $this->cggowl_return_bool($settings['cggowl_autoplay_stop_on_last_u']),
              'disableOnInteraction'      => $this->cggowl_return_bool($settings['cggowl_autoplay_disable_on_inter_u']),
              'reverseDirection'          => $this->cggowl_return_bool($settings['cgggowl_reverse_autoplay_direct_u']),
              'enable_mouse_wheel_scroll' => $this->cggowl_return_bool($settings['cgggowl_enable_mousescroll_u']),
              'mouse_reverse_direction'   => $this->cggowl_return_bool($settings['cgggowl_enable_mousescroll_reverse_u']),
          );
            return $cggowl_carousel_settings;
        }

        private static function cgggowl_make_clickable_start($cggowl_make_clickable)
        {
            if (!empty($cggowl_make_clickable)) {
                if($cggowl_make_clickable['make_block_clickable'] == 'yes'){
                  if($cggowl_make_clickable['make_block_clickable_makeit_acf'] == 'yes'){
                    if (class_exists('acf')) {
                    $cggowl_perma = get_field($cggowl_make_clickable['make_block_clickable_makeit_acf_field']);
                    if($cggowl_make_clickable['make_block_clickable_makeit_acf_open_new_tab'] == 'yes' ){
                        echo '<a target="_blank" class="cggowl-cl-block" href="' . esc_url($cggowl_perma) . '">';
                    }else{
                        echo '<a class="cggowl-cl-block" href="' .  esc_url($cggowl_perma) . '">';
                    }
                    }
                  }else{
                    if($cggowl_make_clickable['make_block_clickable_makeit_acf_open_new_tab'] == 'yes' ){
                        echo '<a target="_blank" class="cggowl-cl-block" href="' . get_permalink() . '">';
                    }else{
                        echo '<a class="cggowl-cl-block" href="' . get_permalink() . '">';
                    }
                  }
                }
            }
        }

        private static function cgggowl_make_clickable_end($cggowl_make_clickable)
        {
            if (!empty($cggowl_make_clickable)) {
                if ($cggowl_make_clickable['make_block_clickable'] == 'yes'):
                echo '</a>';
                endif;
            }
        }

        private static function cggowl_field_start($cggowl_field_gen, $cggowl_key)
        {
            if (!empty($cggowl_field_gen)) {
                echo '<div id="' . esc_attr($cggowl_field_gen[$cggowl_key]['field_id']) . '"  class="cggowl-repeater-container cggowl-elementor-outerblock elementor-repeater-item-'. $cggowl_field_gen[$cggowl_key]['_id'] .' '.esc_attr($cggowl_field_gen[$cggowl_key]['field_class']) . '" >';
                echo '<div class="cggowl-elementor-innerblock">';
            }
        }


        private static function cggowl_field_image_start($cggowl_field_gen, $cggowl_key)
        {
            if (!empty($cggowl_field_gen)) {
                echo '<div id="' . esc_attr($cggowl_field_gen[$cggowl_key]['field_id']) . '"  class="'. esc_attr($cggowl_field_gen[$cggowl_key]['cggowl_image_hover_effect_tab_hover_transition']) .' '. esc_attr($cggowl_field_gen[$cggowl_key]['cggowl_image_hover_effect_tab_hover_overlay']) .' '. esc_attr($cggowl_field_gen[$cggowl_key]['cggowl_image_hover_effect_tab_normal_overlay']) .' cggowl-repeater-container cggowl-elementor-outerblock elementor-repeater-item-'. $cggowl_field_gen[$cggowl_key]['_id'] .' ' . esc_attr($cggowl_field_gen[$cggowl_key]['field_class']) . '" >';
                echo '<div class="cggowl-elementor-innerblock">';
            }
        }

        private static function cggowl_field_end($cggowl_field_gen, $cggowl_key)
        {
            if (!empty($cggowl_field_gen)) {
                echo '</div>';
                echo '</div>';
            }
        }

        private static function cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key, $cggowl_allowed)
        {
            if (!empty($cggowl_field_gen) && !empty($cggowl_field_gen[$cggowl_key]['cgggowl_title_wrapper'])) {
                echo '<'. wp_kses($cggowl_field_gen[$cggowl_key]['cgggowl_title_wrapper'],  $cggowl_allowed).'>';
            }
        }

        private static function cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key, $cggowl_allowed)
        {
            if (!empty($cggowl_field_gen) && !empty($cggowl_field_gen[$cggowl_key]['cgggowl_title_wrapper'])) {
                echo '</'. wp_kses($cggowl_field_gen[$cggowl_key]['cgggowl_title_wrapper'],  $cggowl_allowed).'>';
            }
        }

        private static function cggowl_c_before_placer($cggowl_field_gen, $cggowl_key, $cggowl_allowed)
        {
            echo wp_kses($cggowl_field_gen[$cggowl_key]['cggowl_content_before_placer'], $cggowl_allowed);
        }

        private static function cggowl_c_after_placer($cggowl_field_gen, $cggowl_key, $cggowl_allowed)
        {
            echo wp_kses($cggowl_field_gen[$cggowl_key]['cggowl_content_after_placer'], $cggowl_allowed);
        }

        public function cggowl_taxonomy_render($cggowl_id, $cggowl_field_gen, $cggowl_key)
        {
            $taxonomy                  = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_taxonmomny_array'];
            $taxonomy_load_links       = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_load_links'];
            $taxonomy_load_links_count = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_count'];
            $taxonomy_load_links_hira  = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_hirarachical'];

            if ($taxonomy_load_links_hira == 'yes') {
                $taxonomy_load_links_hira_ena = true;
            } else {
                $taxonomy_load_links_hira_ena = false;
            }

            $taxonomy_load_links_child = $cggowl_field_gen[$cggowl_key]['cggowl_metadata_childless'];
            if ($taxonomy_load_links_child == 'yes') {
                $taxonomy_load_links_hira_ena = true;
            } else {
                $taxonomy_load_links_hira_ena = false;
            }

            $terms = wp_get_object_terms($cggowl_id, $taxonomy, array(
                'hide_empty'   => true,
                'hierarchical' => $taxonomy_load_links_hira_ena,
                'childless'    => $taxonomy_load_links_hira_ena,
                'number'       => $taxonomy_load_links_count,
              ));

            if ($taxonomy_load_links == 'yes') {
                $terms_list = array();
                foreach ($terms as $key => $value) {
                    $terms_list[] = array(
            'name' => $value->name,
            'link' => get_term_link($value->name, $taxonomy),
            );
                    // $terms_list[] = $value->name;
            }
              foreach ($terms_list as $key => $value) {
                  $name = $value['name'];
                  $link = $value['link'];
                  if(!is_wp_error($link) && !is_wp_error($name)){
                    $render_link[] = '<a href="' . $link . '">' . $name . '</a>';
                  }

              }
              if (!empty($render_link)) {
                  $the_terms = implode(", ", $render_link);
                  return $the_terms;
              }
            } else {
                $terms_list = array();
                foreach ($terms as $key => $value) {
                    $terms_list[] = $value->name;
                }
                if (!empty($terms_list)) {
                    $the_terms = implode(", ", $terms_list);
                    return $the_terms;
                }
            }
        }

        public function cggowl_ren_metadata_new($cggowl_id, $cggowl_field_gen, $cggowl_key)
        {
          $metatoload        = $cggowl_field_gen[$cggowl_key]['cggowl_meta_to_load'];
          switch ($metatoload) {
          case 'author':
          $author_id    = get_post_field('post_author', $cggowl_id);
          $display_name = get_the_author_meta('display_name', $author_id);
          return esc_html($display_name);
          break;
          case 'taxonomy':
          return wp_kses($this->cggowl_taxonomy_render($cggowl_id, $cggowl_field_gen, $cggowl_key), $this->cggowl_html_allowed_html());
          break;

          case 'date':
          return get_the_date('j F Y', $cggowl_id);
          break;
          case 'commentcount':
          return esc_html(get_comments_number($cggowl_id));
          break;
          }
        }

        public function cggowl_gen_fields($cggowl_global_id, $cggowl_field_gen, $settings, $product)
        {
            $cggowl_field_gen = $this->cggowl_ren_func_repeater_to_array($cggowl_field_gen);

            $cggowl_make_clickable_block = $settings['make_block_clickable'];
            $cggowl_make_acf_link = $settings['make_block_clickable_makeit_acf'];
            $cggowl_click_acf_field = $settings['make_block_clickable_makeit_acf_field'];
            $cggowl_open_in_new_tab = $settings['make_block_clickable_makeit_acf_open_new_tab'];

            $cggowl_make_clickable = array(
              'make_block_clickable' => $cggowl_make_clickable_block,
              'make_block_clickable_makeit_acf' => $cggowl_make_acf_link,
              'make_block_clickable_makeit_acf_field' => $cggowl_click_acf_field,
              'make_block_clickable_makeit_acf_open_new_tab' => $cggowl_open_in_new_tab,
            );

            $cggowl_allowed = $this->cggowl_html_allowed_html();
            foreach (array_column($cggowl_field_gen, 'field_type') as $cggowl_key => $cggowl_value) {
                switch ($cggowl_value) {

                case 'title':
                  $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                    $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                      $this::cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key, $cggowl_allowed);
                        //content to print in
                        echo esc_html(the_title_attribute($cggowl_field_gen)); //the_title_attribute which is safe to use

                      $this::cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                    $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                  $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                break;

                case 'content':
                  $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                    $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                      $this::cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                        //content to print in
                        $this::cggowl_c_before_placer($cggowl_field_gen, $cggowl_key, $cggowl_allowed);
                          echo wp_kses($this->cggowl_ren_content($cggowl_global_id, $cggowl_field_gen, $cggowl_key), $cggowl_allowed);
                        $this::cggowl_c_after_placer($cggowl_field_gen, $cggowl_key, $cggowl_allowed);

                      $this::cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                    $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                  $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                break;

                case 'excerpt':
                $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                  $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                    $this::cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                      //content to print in
                      echo esc_html(get_the_excerpt($engcor_field_gen)); //the_title_attribute which is safe to use

                    $this::cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                  $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                break;

                case 'metadata':
                  $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                    $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                      $this::cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                        //content to print in
                        $cggowl_m_out = $this->cggowl_ren_metadata($cggowl_global_id, $cggowl_field_gen, $cggowl_key);
                        $cggowl_m_out = implode("&nbsp;|&nbsp;", $cggowl_m_out);
                        echo wp_kses($cggowl_m_out, $cggowl_allowed);

                      $this::cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                    $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                  $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                break;

                case 'button':
                  $cggowl_r_id              = get_the_ID();
                  $cggowl_r_buttonfieldtype = $cggowl_field_gen[$cggowl_key]['button_field_type'];
                  $cggowl_r_customfieldname = $cggowl_field_gen[$cggowl_key]['customfieldurl_gen'];
                  $cggowl_r_buttonfieldtext = $cggowl_field_gen[$cggowl_key]['button_field_type_text'];

                  if ($cggowl_r_buttonfieldtype == 'woocommercecart') {
                      if (class_exists('WooCommerce')):
                      $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                      echo sprintf(
                          '<a href="%s" data-quantity="1" style="' . esc_attr($cggowl_button_css_gen) . '" class="%s" %s>%s</a>',
                          esc_url($product->add_to_cart_url()),
                          esc_attr(implode(' ', array_filter(array(
                      'cggowl-cl-button-a '. $cggowl_field_gen[$cggowl_key]['field_class'] , 'product_type_' . $product->get_type(),
                      $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                      $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : '',
                    )))),
                          wc_implode_html_attributes(array(
                      'data-product_id'  => $product->get_id(),
                      'data-product_sku' => $product->get_sku(),
                      'aria-label'       => $product->add_to_cart_description(),
                      'rel'              => 'nofollow',
                    )),
                          esc_html($cggowl_r_buttonfieldtext)
                      );
                      $this::cggowl_field_end($cggowl_field_gen, $cggowl_key); else:
                      esc_html_e('WooCommerce Not Active', 'cggowl');
                      endif;
                  } elseif ($cggowl_r_buttonfieldtype == 'customfieldurlacfdonwload') {
                      $cggowl_c_url = $this->cggowl_ren_button($cggowl_r_id, $cggowl_r_buttonfieldtype, $cggowl_r_customfieldname);
                      if (!empty($cggowl_c_url)):
                      $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                      echo '<a href="' . esc_url($cggowl_c_url) . '" download >' . esc_html($cggowl_r_buttonfieldtext) . '</a>';
                      $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                      endif;
                  } else {
                      $cggowl_c_url   = $this->cggowl_ren_button($cggowl_r_id, $cggowl_r_buttonfieldtype, $cggowl_r_customfieldname);
                      $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                      echo '<a href="' . esc_url($cggowl_c_url) . '" >' . esc_html($cggowl_r_buttonfieldtext) . '</a>';
                      $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                  }
                break;

                case 'image':
                $cggowl_img_id        = get_the_ID();
                $cggowl_img_type      = $cggowl_field_gen[$cggowl_key]['field_image_url'];
                $cggowl_img_custom    = $cggowl_field_gen[$cggowl_key]['field_image_acf_or_custom'];
                $adv_settings         =  $cggowl_field_gen[$cggowl_key];
                $cggowl_img_src      = $this->cggowl_ren_image($adv_settings, $cggowl_img_type, $cggowl_img_id, $cggowl_img_type_size='', $cggowl_img_custom);

                if (!empty($cggowl_img_src)):
                  $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                    $this::cggowl_field_image_start($cggowl_field_gen, $cggowl_key);

                    echo '<figure>';
                    echo '<div class="cggowl-containter-image-hold">';
                    echo wp_kses($cggowl_img_src, $cggowl_allowed);
                    if ($settings['cgggowl_enable_lazy_load'] == 'yes'):
                        echo '<div class="swiper-lazy-preloader"></div>';
                    endif;
                    echo '</div>';
                    echo '</figure>';

                      $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                    $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                endif;

                break;

                case 'shortcode':
                $cggowl_shortcode = $cggowl_field_gen[$cggowl_key]['field_shortcode'];
                $cggowl_shortcode = $this->cggowl_ren_shortcode($cggowl_shortcode);
                $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                  $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                    $this::cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                        $this::cggowl_c_before_placer($cggowl_field_gen, $cggowl_key, $cggowl_allowed);
                          echo do_shortcode($cggowl_shortcode);
                        $this::cggowl_c_after_placer($cggowl_field_gen, $cggowl_key, $cggowl_allowed);
                      $this::cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                    $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                  $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                break;

                case 'rating':
                if (class_exists('WooCommerce')):
                if (get_post_type(get_the_id()) == 'product') {
                    $cggowl_average = $product->get_average_rating();
                    $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                    $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                    $this::cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                    if (!empty($product->get_average_rating())):
                                echo '<div class="star-rating" title="' . sprintf(__('Rated %s out of 5', 'woocommerce'), intval($cggowl_average)) . '"><span style="width:' . ((intval($cggowl_average) / 5) * 100) . '%"><strong itemprop="ratingValue" class="rating">' . intval($cggowl_average) . '</strong> ' . __('out of 5', 'cggowl') . '</span></div>';
                    endif;
                    $this::cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                    $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                    $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                } else {
                    esc_html_e('This field only works with Post type WooCommerce', 'cggowl');
                } else:
                  esc_html_e('WooCommerce Not Active', 'cggowl');
                endif;
                break;

                case 'wooprice':
                if (class_exists('WooCommerce')):
                  if (get_post_type(get_the_id()) == 'product') {
                      $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                      $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                      $this::cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                      if (($product->is_type('simple')) || ($product->is_type('external'))) {
                          $cggowl_woocommerce_cur       = get_woocommerce_currency_symbol();
                          $cggowl_simple_regualar_price = get_post_meta(get_the_ID(), '_regular_price', true);
                          $cggowl_simple_sale_price     = get_post_meta(get_the_ID(), '_sale_price', true);

                          $this::cggowl_c_before_placer($cggowl_field_gen, $cggowl_key, $cggowl_allowed);
                          echo wp_kses($this->cggowl_woocommmerce_simple_price_printer($cggowl_simple_regualar_price, $cggowl_simple_sale_price, $cggowl_woocommerce_cur), $cggowl_allowed);
                          $this::cggowl_c_after_placer($cggowl_field_gen, $cggowl_key, $cggowl_allowed);
                      } elseif ($product->is_type('variable')) {
                          $cggowl_available_variations = $product->get_available_variations();
                          $cggowl_price_param          = "display_price";
                          $cggowl_woocommerce_cur      = get_woocommerce_currency_symbol();

                          echo wp_kses($cggowl_field_gen[$cggowl_key]['cggowl_content_before_placer_variable'], $cggowl_allowed);
                          echo esc_html($this->cggowl_woocommmerce_variation_price_printer($cggowl_available_variations, $cggowl_price_param, $cggowl_woocommerce_cur));
                          echo wp_kses($cggowl_field_gen[$cggowl_key]['cggowl_content_after_placer_variable'], $cggowl_allowed);
                      } else {
                          do_action('cggowl_suppport_for_custom_product_type_hook_act', 'cggowl_suppport_for_custom_product_type');
                      }
                      $this::cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                      $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                      $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                  } else {
                      esc_html_e('This field only works with Post type - WooCommerce', 'cggowl');
                  } else:
                  esc_html_e('WooCommerce Not Active', 'cggowl');
                endif;
                break;

                case 'shortcode_elementor_pro':
                  $cggowl_shortcode = $cggowl_field_gen[$cggowl_key]['field_shortcode_elementor'];
                  $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                    $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                      $this::cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($cggowl_shortcode);
                      $this::cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                    $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                  $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                  break;

                case 'html':
                  $cggowl_html = $cggowl_field_gen[$cggowl_key]['field_html'];
                  $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                    $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                      $this::cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                          echo wp_kses($cggowl_html, $cggowl_allowed);
                        $this::cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                      $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                  $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                 break;

                 case "metadatasingle":
                  $cggowl_id       = get_the_ID();
                  $cggowl_data  = $this->cggowl_ren_metadata_new($cggowl_id, $cggowl_field_gen, $cggowl_key);
                  if (!empty($cggowl_data)) {
                      $this::cgggowl_make_clickable_start($cggowl_make_clickable);
                      $this::cggowl_field_start($cggowl_field_gen, $cggowl_key);
                      $this::cggowl_field_wrapper_start($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                      $this::cggowl_c_before_placer($cggowl_field_gen, $cggowl_key, $cggowl_allowed);
                      echo wp_kses($cggowl_data, $cggowl_allowed);
                      $this::cggowl_c_after_placer($cggowl_field_gen, $cggowl_key, $cggowl_allowed);
                      $this::cggowl_field_wrapper_end($cggowl_field_gen, $cggowl_key,$cggowl_allowed);
                      $this::cggowl_field_end($cggowl_field_gen, $cggowl_key);
                      $this::cgggowl_make_clickable_end($cggowl_make_clickable);
                  }
                  break;

                default:
                  // code...
                  break;
              }
            }
        }
    }
}
