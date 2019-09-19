<?php
require_once locate_template('/php/spg-icons.php' );
require_once locate_template('/php/MailSender.php' );

if (!class_exists('ThemeFunctions')) {

    class ThemeFunctions
    {
        private $theme;

        function __construct(ThemeSpg $theme){
            $this->theme = $theme;
        }

        public function add_actions() {
            $mailSender = new MailSender();

            add_action( 'wp_ajax_send_mail', array( $mailSender, 'send' ) );
            add_action( 'wp_ajax_nopriv_send_mail', array( $mailSender, 'send' ) );
            add_action( 'elementor/widgets/widgets_registered', array( $this->theme, 'init_elementor_blocks' ), 26 );

            add_action( 'get_custom_logo', array( $this, 'get_navbar_brand_html' ) );
            add_action( 'customize_register', array( $this, 'add_theme_customize_option' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_theme_frontend'), 111 );

        }

        public function add_filters() {

            add_filter( 'widget_nav_menu_args', array( $this, 'change_widget_nav_menu_args' ) );
            add_filter( 'tommusrhodus_add_footer_layouts', array( $this, 'added_custom_footer_layouts') );

        }

        public function enqueue_theme_frontend() {
            $this->enqueue_theme_styles();
            $this->enqueue_theme_scripts();
        }

        public function enqueue_theme_styles() {
            wp_enqueue_style('uptime-style', get_template_directory_uri() . '/style.css');
            wp_enqueue_style('uptime-child-style',
                get_stylesheet_directory_uri() . '/style.css',
                array('uptime-style'),
                wp_get_theme()->get('Version')
            );
            wp_enqueue_style('style-spg', get_stylesheet_directory_uri() . '/css/style-spg.css');
            wp_add_inline_style('uptime-child-style', $this->get_skin_inline_style());
        }

        public function enqueue_theme_scripts() {
            wp_register_script('scripts-spg', get_stylesheet_directory_uri() . '/js/scripts.js');
            wp_enqueue_script('scripts-spg' );
            wp_localize_script( 'scripts-spg', 'wp_var',
                array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        }

        public function change_widget_nav_menu_args($nav_menu_args, $nav_menu, $args, $instance) {
            $nav_menu_args['menu_class'] = 'nav';
            $nav_menu_args['depth'] = 2;

            return $nav_menu_args;
        }

        public function added_custom_footer_layouts($options) {
            $options['spg'] = 'Default SPG';
            return $options;
        }

        public function get_navbar_brand_html() {
            $html =  '
                <a class="navbar-brand" href="{{home_url}}">            
                      {{custom_logo}}                        
                </a>';

            $html = str_replace('{{custom_logo}}', $this->theme->get_site_logo(), $html);
            $html = str_replace('{{home_url}}', get_home_url(), $html);

            return $html;
        }

        public function add_theme_customize_option(WP_Customize_Manager $wp_customize) {
            $this->theme->theme_customize_add_option(
                $wp_customize,
                array(
                    'id'            => 'footer_budges',
                    'section'       => 'footer',

                    'title'         => esc_html__( 'Footer budges', $this->theme->domain ),

                    'default'   => '',
                    'type'      => 'textarea',
                )
            );

            $this->theme->theme_customize_add_option(
                $wp_customize,
                array(
                    'id'            => 'footer_buttons',
                    'section'       => 'footer',

                    'title'         => esc_html__( 'Footer buttons', $this->theme->domain ),

                    'default'   => '',
                    'type'      => 'textarea',
                )
            );

            $this->theme->theme_customize_add_option(
                $wp_customize,
                array(
                    'id'            => 'link_text',
                    'section'       => 'theme_colors',

                    'title'         => esc_html__( 'Link Text Color', $this->theme->domain ),

                    'default'   => '#3755BE',
                    'type'      => 'color',
                )
            );

            $this->theme->theme_customize_add_option(
                $wp_customize,
                array(
                    'id'            => 'mail_receiver',
                    'section'       => 'title_tagline',

                    'title'         => esc_html__( 'Mail receiver', $this->theme->domain ),
                    'description'   => esc_html__( 'Set email to receive messages', $this->theme->domain ),

                    'option_type'   => 'option'
                )
            );

            $this->theme->theme_customize_add_option(
                $wp_customize,
                array(
                    'id'        => 'logo_width',
                    'section'   => 'header',

                    'title'     => esc_html__( 'Logo Width', $this->theme->domain ),
                    'description'   => esc_html__( 'Set logo width (default auto)', $this->theme->domain ),

                    'type'      => 'text',
                    'default'   => 'auto',
                )
            );
        }

        public function get_skin_inline_style() {
            $bg_dark = get_theme_mod('bg_dark', '#212529');

            $logo_height = str_replace('px', '', get_theme_mod('logo_height', '26px')) . 'px';
            $logo_width = str_replace('px', '', get_theme_mod('logo_width', 'auto'));
            if ($logo_width != 'auto') {
                $logo_width = $logo_width . 'px';
            }
            $link_text = get_theme_mod('link_text', '#3755BE');

            return '
        
            a {
                color: ' .$link_text. '
            }
        
            .navbar-brand img {
				max-height: ' . $logo_height . ';
				width: ' . $logo_width . ';
			}
			
            .navbar-brand svg {
				max-height: ' . $logo_height . ';
				width: ' . $logo_width . ';
			}    
            
            .footer-strip {
                background: '. $bg_dark . ' !important;
            }			    
            ';

        }

    }

}