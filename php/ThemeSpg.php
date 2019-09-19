<?php
require_once locate_template('/php/ThemeFunctions.php' );

if (!class_exists('ThemeSpg')) {

    class ThemeSpg
    {
        public $domain = 'uptime';

        private $option_priority = 300;

        function __construct(){

        }

        public function init() {
            $theme_functions = new ThemeFunctions($this);

            $theme_functions->add_actions();
            $theme_functions->add_filters();

            $this->add_opportuninty_upload_svg();
        }

        public function init_elementor_blocks() {

            require_once(__DIR__ . '/blocks/Widget_SPG_Contact_Us_Form_Block.php');
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
    }

}
