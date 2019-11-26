<?php
require_once locate_template('/php/spg-icons.php' );
require_once locate_template('/php/MailSender.php' );

if (!class_exists('ThemeFunctions')) {

    class ThemeFunctions
    {
        private $theme;

        private $domain = 'uptime';
        private $metabox_prefix = 'spg-';

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
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_theme_frontend'), 111);
            add_action( 'after_setup_theme', array( $this, 'after_setup_theme'), 111 );

        }

        public function add_filters() {

            add_filter( 'widget_nav_menu_args', array( $this, 'change_widget_nav_menu_args' ), 11, 4 );
            add_filter( 'nav_menu_link_attributes', array( $this, 'add_nav_menu_link_attributes' ));
            add_filter( 'theme_mod_header_layout', array( $this, 'theme_mod_header_layout'), 11, 1 );
            add_filter( 'widget_categories_args', array( $this, 'set_widget_categories_dropdown_args' ), 11, 2 );

            add_filter( 'cmb2_meta_boxes', array( $this, 'add_custom_metaboxes' ), 11 );
            add_filter( 'wp_get_attachment_image_src', array( $this, 'get_custom_attachment_image_src' ), 11, 4 );

            add_filter( 'tommusrhodus_add_blog_single_layouts', array( $this, 'add_blog_single_layouts') );
            add_filter( 'tommusrhodus_add_footer_layouts', array( $this, 'add_custom_footer_layouts') );
            add_filter( 'tommusrhodus_add_client_layouts', array( $this, 'add_custom_client_layouts') );
            add_filter( 'tommusrhodus_add_portfolio_single_layouts', array( $this, 'add_custom_portfolio_single_layouts') );
            add_filter( 'tommusrhodus_add_portfolio_layouts', array( $this, 'add_custom_portfolio_layouts') );
            add_filter( 'tommusrhodus_add_blog_layouts', array( $this, 'add_custom_blog_layouts') );
        }

        public function register_sidebar() {

            register_sidebar(
                array(
                    'id'            => 'blog_page_sidebar',
                    'name'          => esc_html__( 'Blog Page Sidebar', $this->domain ),
                    'before_widget' => '<div id="%1$s" class="widget mb-4 %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h5>',
                    'after_title'   => '</h5>'
                )
            );

            register_sidebar(
                array(
                    'id'            => 'mobile_blog_sidebar',
                    'name'          => esc_html__( 'Mobile Blog Sidebar', $this->domain ),
                    'before_widget' => '<div id="%1$s" class="widget mb-4 %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h5>',
                    'after_title'   => '</h5>'
                )
            );

        }

        public function add_shortcodes() {
            add_shortcode( 'spg_video_outline_button', array( $this, 'spg_video_outline_button_shortcode') );
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
            wp_enqueue_style('style-spg',
                get_stylesheet_directory_uri() . '/css/style-spg.css',
                array(),
                wp_get_theme()->get('Version')
            );
            wp_add_inline_style('uptime-child-style', $this->get_skin_inline_style());
        }

        public function enqueue_theme_scripts() {
            wp_register_script('scripts-spg',
                get_stylesheet_directory_uri() . '/js/scripts-spg.js',
                array(),
                wp_get_theme()->get('Version'),
            true
            );
            wp_enqueue_script('scripts-spg',
                get_stylesheet_directory_uri() . '/js/scripts-spg.js',
                array(),
                wp_get_theme()->get('Version'),
                true
            );
            wp_localize_script( 'scripts-spg', 'wp_var',
                array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        }

        public function after_setup_theme() {

            add_image_size( 'spg-blog-post-main', 597, 497, true );
            add_image_size( 'spg-blog-post-card', 290, 186, true );
            add_image_size( 'spg-blog-post-card-popular', 81, 60, true );

        }

        public function spg_video_outline_button_shortcode($atts) {
            $values = shortcode_atts(
                array(
                    'media_url' 	=> '',
                    'button_style'	=> 'icon',
                    'button_label'	=> 'Watch Video'
                ),
                $atts );

            if( 'button' == $values['button_style'] ) {
                $output = '
                <a class="btn btn-md btn-outline-primary aos-init aos-animate" data-fancybox data-aos="fade-up" href="'. esc_url( $values['media_url'] ) .'">'. $values['button_label'] .'</a>';
            } else {
                $output = '
				<a data-fancybox href="'. esc_url( $values['media_url'] ) .'" class="btn btn-xlg btn-primary btn-round mx-auto mb-4 aos-init aos-animate" data-aos="fade-up">
		    		'. tommusrhodus_svg_icons_pluck( 'Play', 'icon' ) .'
		    	</a>';
            }

            return $output;

        }

        public function change_widget_nav_menu_args($nav_menu_args, $nav_menu, $args, $instance) {
            $nav_menu_args['menu_class'] = 'nav';
            $nav_menu_args['depth'] = 2;

            return $nav_menu_args;
        }

        public function add_nav_menu_link_attributes($atts) {
            $atts['itemprop'] = 'url';

            return $atts;
        }

        public function theme_mod_header_layout($value) {

            if ( is_category() ) {
                return 'light';
            }

            return $value;

        }

        public function set_widget_categories_dropdown_args($cat_args, $instance) {

            $cat_args['show_option_all'] = 'All';

            return $cat_args;
        }

        public function add_custom_metaboxes($meta_boxes) {

            $meta_boxes[] = array(
                'id'           => 'post_thumbnails',
                'title'        => esc_html__( 'Post Thumbnails', $this->domain ),
                'object_types' => array( 'post' ), // post type
                'context' => 'normal',
                'priority' => 'high',
                'show_names' => true, // Show field names on the left
                'fields' => array(
                    array(
                        'name' => esc_html__( 'Main thumbnail', $this->domain ),
                        'desc' => 'Enter main thumbnail',
                        'id'   => $this->metabox_prefix . 'blog-post-main',
                        'type' => 'file',
                    ),
                    array(
                        'name' => esc_html__( 'Card thumbnail', $this->domain ),
                        'desc' => 'Enter main thumbnail',
                        'id'   => $this->metabox_prefix . 'blog-post-card',
                        'type' => 'file',
                    ),
                    array(
                        'name' => esc_html__( 'Popular thumbnail', $this->domain ),
                        'desc' => 'Enter main thumbnail',
                        'id'   => $this->metabox_prefix . 'blog-post-card-popular',
                        'type' => 'file',
                    ),

                )
            );

            return $meta_boxes;

        }

        public function get_custom_attachment_image_src( $image, $attachment_id, $size, $icon ) {

            if ( (is_string($size)) && ( stripos($size, 'spg-blog-post-') !== false ) ) {

                $post = get_post();

                $spg_img_url = get_post_meta( $post->ID, $size, 1);
                $image[0] = $spg_img_url;

            }

            return $image;
        }

        public function add_blog_single_layouts($options) {

            $options['none'] = 'None Hero';

            return $options;
        }

        public function add_custom_footer_layouts($options) {
            $options['spg'] = 'Default SPG';
            return $options;
        }

        public function add_custom_client_layouts($options) {
            $options['Medium Logos'] = 'medium';
            $options['Medium Logos, No Margin Bottom'] = 'medium-no-margin';
            return $options;
        }

        public function add_custom_portfolio_single_layouts($options) {
            $options['study-additional'] = 'Study (additional)';
            return $options;
        }

        public function  add_custom_portfolio_layouts($options) {
            $options['spg'] = 'SPG (additional)';
            return $options;
        }

        public function add_custom_blog_layouts($options) {
            $options['card-spg'] = 'Blog Cards (additional)';
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
            $bg_primary = get_theme_mod('bg_dark', '#3755BE');
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

            .blog a, archive a{
                color: ' .$bg_primary. '
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

if (!function_exists('spg_has_post_thumbnail')) {

    function spg_has_post_thumbnail( $post = null )
    {

        if ( is_string($post) == 1 ) {
            $current_post = get_post();
            $url = get_post_meta($current_post->ID, $post, true);

            return ( !isset($url) || $url !== '' );
        }

        return has_post_thumbnail( get_post( $post ) );
    }

}