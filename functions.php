<?php
/**
 * Theme functions and definitions.
 * This child theme was generated by Merlin WP.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/*
 * If your child theme has more than one .css file (eg. ie.css, style.css, main.css) then
 * you will have to make sure to maintain all of the parent theme dependencies.
 *
 * Make sure you're using the correct handle for loading the parent theme's styles.
 * Failure to use the proper tag will result in a CSS file needlessly being loaded twice.
 * This will usually not affect the site appearance, but it's inefficient and extends your page's loading time.
 *
 * @link https://codex.wordpress.org/Child_Themes
 */

if (!function_exists('uptime_child_enqueue_styles')) {
    function tommusrhodus_generate_skin_uptime_child()
    {

        $bg_dark = get_theme_mod('bg_dark', '#212529');

        $logo_height = str_replace('px', '', get_theme_mod('logo_height', '26px')) . 'px';
        $logo_width = str_replace('px', '', get_theme_mod('logo_width', 'auto'));
        if ($logo_width != 'auto') {
            $logo_width = $logo_width . 'px';
        }
        $link_text = get_theme_mod('link_text', '#3755BE');

        $skin = '
        
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

        return $skin;
    }

    function uptime_child_enqueue_styles()
    {
        wp_enqueue_style('uptime-style', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('uptime-child-style',
            get_stylesheet_directory_uri() . '/style.css',
            array('uptime-style'),
            wp_get_theme()->get('Version')
        );
        wp_enqueue_style('style-spg', get_stylesheet_directory_uri() . '/css/style-spg.css');

        wp_add_inline_style('uptime-child-style', tommusrhodus_generate_skin_uptime_child());

        wp_register_script('scripts-spg', get_stylesheet_directory_uri() . '/js/scripts.js');
        wp_enqueue_script('scripts-spg' );
        wp_localize_script( 'scripts-spg', 'wp_var',
            array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

    }

    add_action('wp_enqueue_scripts', 'uptime_child_enqueue_styles', 111);
}

if (!function_exists('uptime_child_get_custom_logo')) {
    function uptime_child_get_custom_logo()
    {

        $site_logo = '';
        if( $custom_logo_id = get_theme_mod('custom_logo') ){
            $site_logo = get_attached_file( $custom_logo_id );
        }

        if( mime_content_type($site_logo) == 'image/svg+xml' ) {
            $custom_logo = '
            <span class="site-logo">
              {{home_logo_src}}
            </span>            
            ';

            $custom_logo = str_replace('{{home_logo_src}}', file_get_contents($site_logo), $custom_logo);
        } else {
            $custom_logo = '<img class="d-inline-block align-top site-logo" src="{{home_logo_src}}" alt="Softwareplanetgroup">';

            $custom_logo = str_replace('{{home_logo_src}}', wp_get_attachment_url($custom_logo_id), $custom_logo);
        }


        $html =  '
        <a class="navbar-brand" href="{{home_url}}">            
              {{custom_logo}}                        
        </a>';

        $html = str_replace('{{custom_logo}}', $custom_logo, $html);
        return str_replace('{{home_url}}', get_home_url(), $html);
    }

    add_action('get_custom_logo', 'uptime_child_get_custom_logo');
}

function wp_upload_mimes($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'wp_upload_mimes');


if (!function_exists('uptime_child_widget_nav_menu_args')) {
    function uptime_child_widget_nav_menu_args($nav_menu_args, $nav_menu, $args, $instance)
    {
        $nav_menu_args['menu_class'] = 'nav';
        $nav_menu_args['depth'] = 2;

        return $nav_menu_args;
    }
    add_filter( 'widget_nav_menu_args', 'uptime_child_widget_nav_menu_args' );
}

if (!function_exists('uptime_child_add_footer_layouts')) {
    function uptime_child_add_footer_layouts($options) {

        $options['spg'] = 'Default SPG';

        return $options;
    }
    add_filter( 'tommusrhodus_add_footer_layouts', 'uptime_child_add_footer_layouts' );
}

if (!function_exists('uptime_child_init_elementor_blocks')) {
    function uptime_child_init_elementor_blocks() {

        require_once(__DIR__ . '/blocks/Widget_SPG_Contact_Us_Form_Block.php');
    }
    add_action('elementor/widgets/widgets_registered', 'uptime_child_init_elementor_blocks', 26);
}

if (!function_exists('uptime_child_customize_register')) {

    $option_priority  = 300;

    function theme_option_add_controll($wp_customize, $theme_option_var = array()) {
        global $option_priority;

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
                'priority'   => $option_priority++,
                'section'    => $theme_option['section'],
                'type'       => $theme_option['type'],
            )
        ) );

    }

    function uptime_child_customize_register( WP_Customize_Manager $wp_customize ) {

        theme_option_add_controll(
            $wp_customize,
            array(
                'id'            => 'footer_budges',
                'section'       => 'footer',

                'title'         => esc_html__( 'Footer budges', 'uptime' ),

                'default'   => '',
                'type'      => 'textarea',
            )
        );

        theme_option_add_controll(
            $wp_customize,
            array(
                'id'            => 'footer_buttons',
                'section'       => 'footer',

                'title'         => esc_html__( 'Footer buttons', 'uptime' ),

                'default'   => '',
                'type'      => 'textarea',
            )
        );

        theme_option_add_controll(
            $wp_customize,
            array(
                'id'            => 'link_text',
                'section'       => 'theme_colors',

                'title'         => esc_html__( 'Link Text Color', 'uptime' ),

                'default'   => '#3755BE',
                'type'      => 'color',
            )
        );

        theme_option_add_controll(
            $wp_customize,
            array(
            'id'            => 'mail_receiver',
            'section'       => 'title_tagline',

            'title'         => esc_html__( 'Mail receiver', 'uptime' ),
            'description'   => esc_html__( 'Set email to receive messages', 'uptime' ),

            'option_type'   => 'option'
            )
        );

        theme_option_add_controll(
            $wp_customize,
            array(
                'id'        => 'logo_width',
                'section'   => 'header',

                'title'     => esc_html__( 'Logo Width', 'uptime' ),
                'description'   => esc_html__( 'Set logo width (default auto)', 'uptime' ),

                'type'      => 'text',
                'default'   => 'auto',
            )
        );

    }

    add_action( 'customize_register', 'uptime_child_customize_register', 500 );
}

add_action( 'wp_ajax_send_mail', 'wpd_ajax_send_mail' );
add_action( 'wp_ajax_nopriv_send_mail', 'wpd_ajax_send_mail' );
function wpd_ajax_send_mail() {

    $body = json_decode(file_get_contents( 'php://input' ), true);

    $mailType = $body['mailType'];
    $form_data = $body['form_data'];

    $headers     = array(
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=iso-8859-1',
        'From: SPG Website <request@softwareplanetgroup.com>',
    );
    $htmlContent = '';

    if ( $mailType == 'contact_form_message' ) {
        fill_contact_form_message_mail( $form_data, $htmlContent );
    }

    $result = false;
    try {
        $result = wp_mail( get_option( 'mail_receiver' ),
            'New Message Enquiry from SPG Website - ' . date( "h:i d-M-Y" ),
            $htmlContent,
            implode( "\r\n", $headers ) );

    } catch ( Exception $e ) {
        echo json_encode( array( 'result' => false, 'error' => $e->getMessage() ) );
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }

    echo json_encode( array( 'result' => $result ) );
    wp_die();
}

function fill_contact_form_message_mail($form_data, &$htmlContent ) {

    $mailTemplateFile = __DIR__ . "/mailTemplate.html";
    if ( file_exists( $mailTemplateFile ) ) {
        $htmlContent = file_get_contents( $mailTemplateFile );
        $htmlContent = str_replace( "{{template_directory_uri}}", get_stylesheet_directory_uri(), $htmlContent );
        $htmlContent = str_replace( "{{site_url}}", get_site_url(), $htmlContent );
        $htmlContent = str_replace( "{{contactInformation}}", '', $htmlContent );

        $htmlContent = str_replace( '{{contact_form_name}}', $form_data['name'], $htmlContent );
        $htmlContent = str_replace( '{{contact_form_email}}', $form_data['email'], $htmlContent );
        $htmlContent = str_replace( '{{contact_form_message}}', str_replace("\n\r", '<br><br>', $form_data['message']), $htmlContent );

    }

}

require_once(__DIR__ . '/spg-icons.php');