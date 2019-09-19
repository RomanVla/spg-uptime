<?php
/**
 * Created by IntelliJ IDEA.
 * User: romanvl
 * Date: 9/19/2019
 * Time: 1:43 PM
 */

if (!class_exists('MailSender')) {
    class MailSender
    {
        private $content = '';
        private $mailTemplates = array(
            'contact_form_message' => __DIR__ . "/mailTemplate.html"
        );

        public function send() {
            $result = false;

            $this->process_request();

            try {
                $result = wp_mail( get_option( 'mail_receiver' ),
                    'New Message Enquiry from SPG Website - ' . date( "h:i d-M-Y" ),
                    $this->get_content(),
                    implode( "\r\n", $this->get_mail_header() ) );

            } catch ( Exception $e ) {
                echo json_encode( array( 'result' => false, 'error' => $e->getMessage() ) );
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }

            echo json_encode( array( 'result' => $result ) );

            $this->reinit_mail_sender();
            wp_die();
        }

        private function fill_content_by_form_message($form_data, $mailTemplateFile) {

            if ( file_exists( $mailTemplateFile ) ) {
                $this->content = file_get_contents( $mailTemplateFile );
                $this->content = str_replace( "{{template_directory_uri}}", get_stylesheet_directory_uri(), $this->content );
                $this->content = str_replace( "{{site_url}}", get_site_url(), $this->content );
                $this->content = str_replace( "{{contactInformation}}", '', $this->content );

                $this->content = str_replace( '{{contact_form_name}}', $form_data['name'], $this->content );
                $this->content = str_replace( '{{contact_form_email}}', $form_data['email'], $this->content );
                $this->content = str_replace( '{{contact_form_message}}', str_replace("\n\r", '<br><br>', $form_data['message']), $this->content );

            }

        }

        private function process_request() {
            $body = json_decode(file_get_contents( 'php://input' ), true);

            $mailType = $body['mailType'];
            $form_data = $body['form_data'];

            if ( $mailType == 'contact_form_message' ) {
                $this->fill_content_by_form_message( $form_data, $this->mailTemplates[$mailType] );
            }

        }

        private function get_mail_header() {
            return array(
                'MIME-Version: 1.0',
                'Content-Type: text/html; charset=iso-8859-1',
                'From: SPG Website <request@softwareplanetgroup.com>',
            );
        }

        private function get_content() {
            return $this->content;
        }

        private function reinit_mail_sender() {
            $this->content = '';
        }
    }
}
