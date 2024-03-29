<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Widget_SPG_Contact_Us_Form_Block extends Widget_Base
{

    //Return Class Name
    public function get_name()
    {
        return 'spg-contact-us-form-block';
    }

    //Return Block Title (for blocks list)
    public function get_title()
    {
        return esc_html__('Contact Us Form', 'tr-framework');
    }

    //Return Block Icon (for blocks list)
    public function get_icon()
    {
        return 'eicon-form-vertical';
    }

    public function get_categories()
    {
        return ['uptime-elements'];
    }

    /**
     * Whether the reload preview is required or not.
     *
     * Used to determine whether the reload preview is required.
     *
     * @since 1.0.0
     * @access public
     *
     * @return bool Whether the reload preview is required.
     */
    public function is_reload_preview_required() {
        return true;
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'section_content', [
                'label' => esc_html__('Contact form', 'tr-framework'),
            ]
        );

        $this->add_control(
            'form_background', [
                'label' => __('Form background', 'tr-framework'),
                'type' => Controls_Manager::COLOR,
                'default' => ''
            ]
        );

        $this->add_control(
            'form_title', [
                'label' => __('Form Title', 'tr-framework'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Request additional details from us',
                'label_block' => true
            ]
        );

        $this->start_controls_tabs('tabs_inputs');

        $this->start_controls_tab(
            'tabs_input_name',
            [
                'label' => __('Name', 'elementor'),
            ]
        );

        $this->add_control(
            'form_name_label', [
                'label' => __('Label for name input', 'tr-framework'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Your Name',
                'label_block' => true
            ]
        );

        $this->add_control(
            'form_name_placeholder', [
                'label' => __('Placeholder for name input', 'tr-framework'),
                'type' => Controls_Manager::TEXT,
                'default' => 'e.g. Miles Bennett Dyson',
                'label_block' => true
            ]
        );

        $this->add_control(
            'form_button_title', [
                'label' => __('Form button Title', 'tr-framework'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Send',
                'label_block' => true
            ]
        );

        $this->add_control(
            'form_button_background_color', [
                'label' => __('Form button background color', 'tr-framework'),
                'type' => Controls_Manager::COLOR,
                'default' => ''
            ]
        );

        $this->end_controls_tab();


        $this->start_controls_tab(
            'tabs_input_email',
            [
                'label' => __('Email', 'elementor'),
            ]
        );

        $this->add_control(
            'form_email_label', [
                'label' => __('Label for email input', 'tr-framework'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Email address',
                'label_block' => true
            ]
        );

        $this->add_control(
            'form_email_placeholder', [
                'label' => __('Placeholder for email input', 'tr-framework'),
                'type' => Controls_Manager::TEXT,
                'default' => 'mb.dyson@cyberdyne.net',
                'label_block' => true
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tabs_input_message',
            [
                'label' => __('Message', 'elementor'),
            ]
        );

        $this->add_control(
            'form_message_label', [
                'label' => __('Label for message textarea', 'tr-framework'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Message to us',
                'label_block' => true
            ]
        );

        $this->add_control(
            'form_message_placeholder', [
                'label' => __('Placeholder for message textarea', 'tr-framework'),
                'type' => Controls_Manager::TEXT,
                'default' => 'I need a quote for a Skynet project development/security testing.',
                'label_block' => true
            ]
        );

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_form_header_footer', [
                'label' => esc_html__('Contact form header, footer', 'tr-framework'),
            ]
        );

        $this->add_control(
            'form_header', [
                'label' => __('Form header', 'tr-framework'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => '',
                'label_block' => true
            ]
        );

        $this->add_control(
            'form_footer', [
                'label' => __('Form footer', 'tr-framework'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => '',
                'label_block' => true
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $user_selected_animation = (bool)$settings['_animation'];

        if (!$user_selected_animation) {
            echo '<div data-aos="fade-up" data-aos-delay="NaN">';
        }

        $form_header = '';
        if ( $settings['form_header'] ) {
            $form_header = '         
                <div class="row">
                    <div class="col-12">
                        ' . $settings['form_header'] . '
                    </div>
                </div>
            ';
        }

        $form_footer = '';
        if ( $settings['form_footer'] ) {
            $form_footer = '
                <div class="row">
                    <div class="col-12">
                        ' . $settings['form_footer'] . '
                    </div>
                </div>            
            ';
        }

        $form_title = '';
        if ($settings['form_title']) {
            $form_title = '
                <div class="is-size-4 pb-4"> ' . $settings['form_title'] . ' </div>
            ';
        }

        echo $form_header . '         
        <div class="row">
            <div class="col-12">
                <div class="card contacts-form" style="background-color: ' . $settings['form_background'] . '">
                    <div class="card-body">
        
                        ' . $form_title . '        
        
                            <div method="post">
        
                                <form id="message-form" class="contact-us-form">
                                    <div class="form-row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label> ' . $settings['form_name_label'] . ' </label>
                                                <input id="name" type="text" name="name" class="form-control" placeholder="' . $settings['form_name_placeholder'] . '" />
                                            </div>
            
                                            <div class="form-group">
                                                <label> ' . $settings['form_email_label'] . '</label>
                                                <input id="email" class="form-control" type="email" name="email" aria-describedby="emailHelp" placeholder="' . $settings['form_email_placeholder'] . '"/>           
                                            </div>
                                            
                                            <div class="form-group">
                                                <label> ' . $settings['form_message_label'] . ' </label>
                                                <textarea id="message" class="form-control" name="message" placeholder="' . $settings['form_message_placeholder'] . '" rows="5" cols="33"></textarea>
                                            </div>
                                                                                        
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-start p-2">
                                        <div>
                                            <button id="send-message" class="btn btn-primary message-form-btn-send-message form-control" style="border-color: ' .$settings['form_button_background_color']. ';background-color: ' .$settings['form_button_background_color']. ' "> ' . $settings['form_button_title'] . ' <span class="px-1"> ' .do_shortcode('[uptime_icon icon_name="Send"]').  '</span>
                                            </button>
                                            <div class="invalid-feedback">Error sending message. Try again.</div>
                                        </div>
                                    </div>
                                    
                                </form>
        
                            </div>
        
                        </div>
                    
                    </div>
                </div>
            </div>
	         '
         . $form_footer;

        if (!$user_selected_animation) {
            echo '</div>';
        }

    }

}

// Register our new widget
Plugin::instance()->widgets_manager->register_widget_type(new Widget_SPG_Contact_Us_Form_Block());