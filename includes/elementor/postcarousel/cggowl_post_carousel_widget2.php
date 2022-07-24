<?php
/**
 *
 * @since 1.0.0
 */
namespace Elementor;
use Elementor\Cggowl_Featured_Image_Getter;

class Elementor_Cggowl_Post_Carousel2 extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'cggowl_post_carousel2';
    }

    /**
     * Get widget title.
     *
     * Retrieve Geekygreenowl widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Carousel Builder', 'cggowl');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Geekygreenowl widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-custom';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Geekygreenowl widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['cggowl-category'];
    }

    /**
     * Get list of custom postypes.
     *
     * Retrieve the list of categories the Geekygreenowl widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array custom post type list.
     */
    public function cggowl_get_data()
    {
        $cggowl_data = new \CGGOWLCORENSUPG\CggowlUpg();
        return $cggowl_data;
    }



    private function get_acf_list()
    {
        if (!class_exists('acf')) {
            return array();
        }
        global $wpdb;

        if (false === ($cggowl_qry = get_transient('cggowl_acf_list_transient'))) {
            // It wasn't there, so regenerate the data and save the transient
            $cggowl_qry = new \WP_Query('posts_per_page=-1&post_excerpt=field_name&post_title=field_label&post_type=acf-field');
            set_transient('cggowl_acf_list_transient', $cggowl_qry, 12 * 107000);
        }
        $cggowl_cus_acf_field = array();
        foreach ($cggowl_qry->posts as $key => $value) {
            $cggowl_cus_acf_field[$value->post_excerpt] = $value->post_title;
        }
        return $cggowl_cus_acf_field;
    }


    public function cggowl_meta_data_retrievier_taxonomy()
    {
        $args = array(
            'public' => true,
        );
        $output     = 'object'; // or objects
        $operator   = 'and'; // 'and' or 'or'
        $taxonomies = get_taxonomies($args, $output, $operator);
        $taxonarray = array();
        foreach ($taxonomies as $key => $value) {
            $taxonarray[$value->name] = $value->label;
        }
        return $taxonarray;
    }

    /**
     * Register Geekygreenowl widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $cggowl_data                    = $this->cggowl_get_data();
        $cggowl_custompostype_array     = $cggowl_data->cggowl_list_of_posttypes();
        $cggowl_taxonomy_array          = $cggowl_data->cggowl_list_of_terms();
        $cggowl_taxonomy_tag_array      = $cggowl_data->cggowl_list_of_tags();
        $cggowl_taxonomy_repeat_tax     = $cggowl_data->cggowl_list_of_taxonomy_repeater_field();
        $cggowl_taxonomy_repeat_tax[''] = 'None';
        $cggowl_taxonomy_repeat_term    = $cggowl_data->cggowl_list_of_terms_repeater_field();
        $cggowl_post_status_array       = $cggowl_data->cggowl_list_of_post_status();
        $cggowl_post_key_list           = $cggowl_data->cggowl_custom_post_type_keylist();
        $cggowl_image_size_list         = $cggowl_data->cggowl_ren_func_array_of_image_size();
        $cggowl_taxonomy_tax_mata       = $cggowl_data->cggowl_list_of_taxonomy_repeater_field();

        require plugin_dir_path(__FILE__) . 'controls/control-cggowl-carouselmaker.php';
        require plugin_dir_path(__FILE__) . 'controls/control-cggowl-carouseldesigner.php';
        require plugin_dir_path(__FILE__) . 'controls/control-cggowl-carouselcontrol.php';
        require plugin_dir_path(__FILE__) . 'controls/control-cggowl-orderandfilter.php';
    }

    /**
     * Render Geekygreenowl widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings                 = $this->get_settings_for_display();
        $cggowlconfig             = new \CGGOWLCORENSUPG\CggowlUpg();
        $cggowl_args = $cggowlconfig->cggowl_args_generator($settings);
        $cggowl_carousel_settings = $cggowlconfig->cggowl_carousel_settings($settings);

        //Make clickable
        $cggowl_make_clickable = $settings['make_block_clickable'];

        //Background parameters
        $cggowl_b_enable        = $settings['cggowl_make_featured_image_as_background'];
        $cggowl_allowed         = $cggowlconfig->cggowl_html_allowed_html();

        global $product;

        $cggowl_query = new \WP_Query($cggowl_args); ?>
        <div id="cggowl-container" data-settings ='<?php echo wp_json_encode($cggowl_carousel_settings); ?>' class="cggowl-container owlswiper-container"><!-- Main Container Starts -->
          <?php if (class_exists('WooCommerce')):
          echo '<div class="cggowl-wooocommerc-notices ">';
          if (function_exists('wc_print_notices')) {
              wc_print_notices();
          }
          echo '</div>';
          endif;
          ?>
          <div id="cggowl-row cggowl-row-spec-<?php echo intval(get_queried_object_id()); ?>"  class="cggowl-row swiper-wrapper cggowl-row-mob-<?php echo intval($settings['cggowl_carousel_column_mobile']); ?> cggowl-row-tab-<?php echo intval($settings['cggowl_carousel_column_tablet']); ?> cggowl-row-desk-<?php echo intval($settings['cggowl_carousel_column_dektop']); ?>"> <!-- Second loop Starts -->
        <?php if ($cggowl_query->have_posts()):
          while ($cggowl_query->have_posts()): $cggowl_query->the_post();
          $cggowl_global_id = get_the_ID(); ?>
          <div id="cggowl-card-design-outer cggowl-carousel-outer-<?php echo intval(get_the_id()); ?>" class="swiper-slide cggowl-card-design-outer cggowl-carousel-outer-<?php echo intval(get_the_id()); ?>">
            <div id="cggowl-card-design cggowl-carousel-<?php echo intval(get_the_id()); ?>" class="cggowl-card-design cggowl-carousel-<?php echo intval(get_the_id()); ?>" <?php
                if ($cggowl_b_enable == 'yes'):
                  $cggowl_b_back   = $cggowlconfig->cggowl_background_image_genenrator($cggowl_global_id, $settings);
                  echo wp_kses($cggowl_b_back, $cggowl_allowed);
                endif; ?>>
              <div id="cggowl-card-design-mul" class="cggowl-card-design-mul">
                <div id="cggowl-card-design-mul-inner cggowl-card-design-mul-inner-col-1" class="cggowl-card-design-mul-inner cggowl-card-design-mul-inner-col-1" >
                  <?php
                  //the the first content
                  $cggowl_field_gen = $settings['cggowl_field_gen'];
                  $cggowlconfig->cggowl_gen_fields($cggowl_global_id,$cggowl_field_gen, $settings, $product); ?>
                </div>
                <?php
                $cggowl_enable_multi = $settings['cggowl_layout'];
                if ($cggowl_enable_multi == 'grid'):?>
                <div id="cggowl-card-design-mul-inner cggowl-card-design-mul-inner-col-2" class="cggowl-card-design-mul-inner cggowl-card-design-mul-inner-col-2">
                <?php
                  //the the Second content
                  $cggowl_field_gen2 = $settings['cggowl_field_gen2'];
                  $cggowlconfig->cggowl_gen_fields($cggowl_global_id,$cggowl_field_gen2, $settings, $product); ?>
                </div>
                <?php endif; ?>
             </div>
            </div>
          </div>
          <?php endwhile;
        wp_reset_postdata(); else:
          esc_html_e('No match found', 'cggowl');
        endif; ?>
          </div><!-- Second loop Ends -->
          <?php if ($cggowlconfig->cggowl_return_bool($settings['cgggowl_enable_pagination_u']) == true): ?>
            <div class="swiper-pagination"></div>
          <?php endif;?>
          <!-- If we need navigation buttons -->
          <?php if ($cggowlconfig->cggowl_return_bool($settings['cgggowl_enable_arrow_u']) == true): ?>
            <div class="cggowl-nav-control">
              <div class="cggowl-button-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['cggowl_next_icon_code_update_prev'], [ 'aria-hidden' => 'true' ] ); ?></div>
              <div class="cggowl-button-next"><?php \Elementor\Icons_Manager::render_icon( $settings['cggowl_next_icon_code_update_next'], [ 'aria-hidden' => 'true' ] ); ?></div>
            </div>
         <?php endif;?>


          <!-- If we need scrollbar -->
          <?php if ($cggowlconfig->cggowl_return_bool($settings['cgggowl_enable_scrollbar_u']) == true): ?>
                <div class="cggowl-scrollbar swiper-scrollbar"></div>
          <?php endif;?>
        </div><!-- Main Container Ends -->
        <?php
    }
}
