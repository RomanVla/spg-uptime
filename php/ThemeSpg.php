<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

require_once locate_template('/php/ThemeFunctions.php' );

if (!class_exists('ThemeSpg')) {

    class ThemeSpg
    {
        public $domain = 'uptime';

        private $option_priority = 300;

        private static $_instance = null;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;

        }

        function __construct(){

        }

        public function init() {
            $theme_functions = new ThemeFunctions($this);

            $theme_functions->add_actions();
            $theme_functions->add_filters();
            $theme_functions->add_shortcodes();

            add_action( 'widgets_init', array($theme_functions, 'register_sidebar') );
            $this->init_widgets();

            $this->add_opportuninty_upload_svg();
        }

        public function init_widgets() {

            require_once(__DIR__ . '/widgets/SPG_Widget_TommusRhodus_Popular_Widget.php');
            require_once(__DIR__ . '/widgets/blog-call-to-action-widget.php');
            require_once(__DIR__ . '/widgets/Widget_SPG_Category.php');

        }

        public function init_elementor_blocks() {

            require_once(__DIR__ . '/blocks/Widget_SPG_Contact_Us_Form_Block.php');
            require_once(__DIR__ . '/blocks/SPG_Widget_TommusRhodus_Image_Collage_Block.php');

        }

        public function get_site_logo() {

            $logo_html = '';

            if( $custom_logo_id = get_theme_mod('custom_logo') ){
                $custom_logo = get_attached_file( $custom_logo_id );
            } else {
                return $logo_html;
            }

            if( mime_content_type($custom_logo) == 'image/svg+xml' ) {
                $logo_html = '
                    <span class="site-logo">
                      {{home_logo_src}}
                    </span>            
            ';

                $logo_html = str_replace('{{home_logo_src}}', file_get_contents($custom_logo), $logo_html);
            } else {
                $logo_html = '<img class="d-inline-block align-top site-logo" src="{{home_logo_src}}" alt="Softwareplanetgroup">';

                $logo_html = str_replace('{{home_logo_src}}', wp_get_attachment_url($custom_logo_id), $logo_html);
            }

            return $logo_html;
        }

        public function theme_customize_add_option($wp_customize, $theme_option_var = array()) {

            $theme_option = array_merge(
                array(
                    'default'       => '',
                    'type'          => 'text',

                    'option_type' => 'theme_mod', // you can also use 'option'
                    'description' => '',
                    'transport'     => 'postMessage'
                ),
                $theme_option_var
            );

            $wp_customize->add_setting(
                $theme_option['id'],
                array(
                    'default' => $theme_option['default'],
                    'type' => $theme_option['option_type'],
                    'capability' => 'edit_theme_options'
                )
            );

            $wp_customize->add_control( new WP_Customize_Control(
                $wp_customize,
                $theme_option['id'],
                array(
                    'label'      => __( $theme_option['title'], 'textdomain' ),
                    'description' => __( $theme_option['description'], 'textdomain' ),
                    'settings'   => $theme_option['id'],
                    'priority'   => $this->option_priority++,
                    'section'    => $theme_option['section'],
                    'type'       => $theme_option['type'],
                )
            ) );
        }

        private function add_opportuninty_upload_svg() {
            add_filter('upload_mimes', function($mimes) {
                $mimes['svg'] = 'image/svg+xml';
                return $mimes;
            });
        }

        /**
         * Recursively get taxonomy and its children
         *
         * @param string $taxonomy
         * @param int $parent - parent term id
         * @return array
         */
        function get_taxonomy_hierarchy( $taxonomy, $parent = 0 ) {
            // only 1 taxonomy
            $taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;
            // get all direct decendants of the $parent
            $terms = get_terms( $taxonomy, array( 'parent' => $parent ) );
            // prepare a new array.  these are the children of $parent
            // we'll ultimately copy all the $terms into this new array, but only after they
            // find their own children
            $children = array();
            // go through all the direct decendants of $parent, and gather their children
            foreach ( $terms as $term ){
                // recurse to get the direct decendants of "this" term
                $term->children = $this->get_taxonomy_hierarchy( $taxonomy, $term->term_id );
                // add the term to our new array
                $children[ $term->term_id ] = $term;
            }
            // send the results back to the caller
            return $children;
        }

        /**
         * Recursively get all taxonomies as complete hierarchies
         *
         * @param $taxonomies array of taxonomy slugs
         * @param $parent int - Starting parent term id
         *
         * @return array
         */
        function get_taxonomy_hierarchy_multiple( $taxonomies, $parent = 0 ) {
            if ( ! is_array( $taxonomies )  ) {
                $taxonomies = array( $taxonomies );
            }
            $results = array();
            foreach( $taxonomies as $taxonomy ){
                $terms = $this->get_taxonomy_hierarchy( $taxonomy, $parent );
                if ( $terms ) {
                    $results[ $taxonomy ] = $terms;
                }
            }
            return $results;
        }

        public function get_content_parts($content) {

            $content_part_short = stristr ($content, '<cut/>', true);
            if($content_part_short === false) {
                $content_part_short = $content;
            }

            return array(
                'short' => $content_part_short,
                'full' => $content
            );
        }
    }

}
