<?php

if(!( class_exists('SPG_Blog_Call_To_Action') )){
	class SPG_Blog_Call_To_Action extends WP_Widget {
		
		public function __construct() {
			$widget_ops = array(
				'description'                 => __( 'Add a call to action your sidebar.' ),
				'customize_selective_refresh' => true,
			);
			parent::__construct( 'spg_blog_call_to_action', __( 'Blog Call To Action' ), $widget_ops );
		}
		
		function widget($args, $instance)
		{

            $defaults = array(
                'title' => 'Newsletter',
                'bottom_text' => 'We’ll never share your details with third parties. View our <a href="#">Privacy Policy</a> for more info.'
            );
            $instance = wp_parse_args((array) $instance, $defaults);

            echo $args['before_widget'];

            $title = apply_filters('widget_title', $instance['title']);
            if($title) {
                $title = $args['before_title'] . $title. $args['after_title'];
            }

            echo '
            <h3 class="h2 mb-5">' .$title. '</h3>
            
            <div class="d-flex my-2">
                <form id="subscribe-form" class="w-100 subscribe-form">
                    <div class="form-row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input id="email" class="form-control" type="email" name="email" aria-describedby="emailHelp" placeholder="Email Address"/>
                            </div>
                        </div>                    
                    </div>
                    <div class="form-row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button id="subscribe" class="btn btn-primary message-form-btn-send-message form-control">
                                Subscribe
                            </button>
                            <div class="invalid-feedback">Error. Try again.</div>
                        </div>
                    </div>
                </form>                               
            </div>
             
            <div class="text-small text-muted text-center">
                ' .$instance['bottom_text']. '
            </div>';

			echo $args['after_widget'];
		}
		
		function update($new_instance, $old_instance)
		{
            return $new_instance;
		}
	
		function form($instance)
		{

            $defaults = array(
                'title' 	=> '',
                'bottom_text' 	=> '',
            );
            $instance = wp_parse_args((array) $instance, $defaults);

            ?>
			<p>
				<label for="<?= $this->get_field_id('title'); ?>">Title:</label>
				<input class="widefat" style="width: 216px;" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" value="<?= $instance['title']; ?>" />
			</p>
            <p>
                <label for="<?= $this->get_field_id('bottom_text'); ?>">Bottom text:</label>
                <textarea class="widefat" id="<?= $this->get_field_id( 'bottom_text' ); ?>" name="<?= $this->get_field_name( 'bottom_text' ); ?>" type="textarea" value="<?= esc_attr( $instance['bottom_text'] ); ?>"> <?= esc_attr( $instance['bottom_text'] ); ?> </textarea>
            </p>
		<?php
		}
	}

    function spg_register_blog_call_to_action(){
        register_widget( 'SPG_Blog_Call_To_Action' );
    }
    add_action( 'widgets_init', 'spg_register_blog_call_to_action', 20);

}

?>