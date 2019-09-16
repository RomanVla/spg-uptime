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

    protected function _register_controls()
    {

        $this->start_controls_section(
            'section_content', [
                'label' => esc_html__('Contact form', 'tr-framework'),
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
                'default' => 'Your Name',
                'label_block' => true
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
                'default' => 'Email address',
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
                'default' => 'Message to us',
                'label_block' => true
            ]
        );

        $this->end_controls_tabs();

        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $user_selected_animation = (bool)$settings['_animation'];

        if (!$user_selected_animation) {
            echo '<div data-aos="fade-up" data-aos-delay="NaN">';
        }

        echo '
        <div class="row">
        <div class="col-12">
        <div class="card contacts-form">
            <div class="card-body">

                <div class="is-size-4 pb-4"> ' . $settings['form_title'] . ' </div>

                <div class="pb-4">

                    <div method="post">

                        <form id="message-form" class="needs-validation">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label> ' . $settings['form_name_label'] . ' </label>
                                        <input id="name" type="text" name="name" class="form-control" placeholder="e.g. Miles Bennett Dyson" required/>
                                    </div>
    
                                    <div class="form-group">
                                        <label> ' . $settings['form_email_label'] . '</label>
                                        <input id="email" class="form-control" type="email" name="email" aria-describedby="emailHelp" placeholder="mb.dyson@cyberdyne.net" required/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label> ' . $settings['form_message_label'] . ' </label>
                                        <textarea id="message" class="form-control" name="message" placeholder="I need a quote for a Skynet project development/security testing." required ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end p-2">
                                <div class="px-4">
                                    <button id="send-message" class="form-control btn btn-outline-primary message-form-btn-send-message">
                                        Send
                                        <span class="px-1"> <i class="fab fa-telegram-plane"></i> </span>
                                    </button>
                                    <div class="invalid-feedback">Error sending message. Try again.</div>
                                    <p class="invalid-feedback" id="empty-field"></p>
                                </div>
                            </div>
                            
                        </form>

                    </div>

                </div>

            </div>
            </div>
        </div>        
	         ';

        if (!$user_selected_animation) {
            echo '</div>';
        }

    }

}

// Register our new widget
Plugin::instance()->widgets_manager->register_widget_type(new Widget_SPG_Contact_Us_Form_Block());