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

        return str_replace('{{custom_logo}}', $custom_logo, $html);
        return str_replace('{{home_url}}', get_home_url(), $html);
    }

    add_action('get_custom_logo', 'uptime_child_get_custom_logo');
}

if (!function_exists('uptime_child_get_framework_theme_args')) {
    function uptime_child_get_framework_theme_args($framework_args)
    {
        array_push ($framework_args['theme_options'][2]['sections'][0]['options'],
            array(
            'id'        => 'logo_width',
            'title'     => esc_html__( 'Logo Width (default auto)', 'uptime' ),
            'default'   => 'auto',
            'type'      => 'text',
            'transport' => 'postMessage',
            'choices'   => ''
            )
        );

        array_push ($framework_args['theme_options'][1]['sections'][0]['options'],
            array(
                'id'        => 'link_text',
                'title'     => esc_html__( 'Link Text Color', 'uptime' ),
                'default'   => '#3755BE',
                'type'      => 'color',
                'transport' => 'postMessage'
            )
        );

        return $framework_args;
    }
}

add_action('tommusrhodus_framework_theme_args', 'uptime_child_get_framework_theme_args');

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
}
add_filter( 'widget_nav_menu_args', 'uptime_child_widget_nav_menu_args' );

if (!function_exists('uptime_tommusrhodus_add_footer_layouts')) {
    function uptime_tommusrhodus_add_footer_layouts($options) {

        $options['spg'] = 'Default SPG';

        return $options;
    }
}
add_filter( 'tommusrhodus_add_footer_layouts', 'uptime_tommusrhodus_add_footer_layouts' );