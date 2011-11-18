<?php
/*
 *	Plugin Name: Daydream Contact Form
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.2
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_cform');

/*
 *	Widget registering
 */
function daydream_widget_cform() {
	register_widget('daydream_cform');
}

/*
 *	Widget class
 */
class daydream_cform extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_cform() {
		
		$widget_ops = array('classname' => 'wb_dayd_cform_widget', 'description' => '');
		
		$control_ops = array('width' => '', 'height' => '');

		$this->WP_Widget('daydream_widget_cform', '(Daydream) ' . __('Contact Form', 'haku'), $widget_ops, $control_ops);
		
		/*
			Contact form action
		*/
		add_action('wp_ajax_nopriv_daydream_widget_cform_action', 'daydream_widget_cform_action');
				 
		function daydream_widget_cform_action() {
		    		    
		    check_ajax_referer("haku_nonce", "wb_cform_nonce");
		 	
		 	$response = 0;
		 	
		 	$form_contents = $_POST;
		 	$form_contents_name = trim( strip_tags( $form_contents['wb_cform_name'] ) );
		 	$form_contents_email = trim( strip_tags( $form_contents['wb_cform_email'] ) );
		 	$form_contents_message = trim( strip_tags( $form_contents['wb_cform_text'] ) );
		 	
		 	if ( ! $form_contents_name || ! is_email( $form_contents_email ) || ! $form_contents_message ) {
		 		die( $response );
		 	}
		 	
		 	$widget_option = explode( '/+/', $form_contents['wb_cform_var'] );
		 			 	
		 	$email_content = __("This email was sent through your website's contact form widget. You can reply to this email.", 'haku');
		 	$email_content .= "\n";
		 	$email_content .= '- - - - - - - - - - - - - -';
		 	$email_content .= "\n\n";
		 	$email_content .= __('Sent by:', 'haku') . ' &1 ( &2 )';
		 	$email_content .= "\n\n";
		 	$email_content .= __('Message content:', 'haku');
		 	$email_content .= "\n\n";
		 	$email_content .= '&3';
			
			$email_content = str_replace('&1', $form_contents_name, $email_content);
			$email_content = str_replace('&2', $form_contents_email, $email_content);
			$email_content = str_replace('&3', $form_contents_message, $email_content);
			
			$send_to = base64_decode( $widget_option[0] );
		 	$subject = base64_decode( $widget_option[1] );
		 	
		 	$subject = str_replace( '{NAME}', $form_contents_name, $subject);
		 	$subject = str_replace( '{EMAIL}', $form_contents_email, $subject);
		 	
		 	$headers = "From: " . $form_contents_email . "\r\n";
		 	$headers .= "Reply-To: ". $form_contents_email . "\r\n";
		 	$headers .= "MIME-Version: 1.0\r\n";
		 	$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
		 	
		 	if ( mail( $send_to, $subject, $email_content, $headers ) ) {
		 		$response = '1';
		 	}
		 	
		    die( $response );
		    
		}
		
	}
	
	/*
	 *	Widget update
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['send_to'] = ( is_email( $new_instance['send_to'] ) ? $new_instance['send_to'] : $instance['send_to'] );
		$instance['email_subject'] = strip_tags( $new_instance['email_subject'] );
		$instance['success_message'] = strip_tags( $new_instance['success_message'] );
		
		return $instance;
	}
	
	/*
	 *	Displays the widget settings
	 */
	function form($instance) {

		/*
			Default settings
		*/
		
		$defaults = array('title' => __('Ask anything!', 'haku'), 'send_to' => haku_get_user_email(), 'email_subject' => get_bloginfo('name') . ' - ' . __('Message from:', 'haku') . ' {NAME}', 'success_message' => __('Thank you! We received your message.', 'haku') );
		
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('send_to'); ?>"><?php _e('Send to:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('send_to'); ?>" name="<?php echo $this->get_field_name('send_to'); ?>" value="<?php echo $instance['send_to']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('email_subject'); ?>"><?php _e('Emails subject:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('email_subject'); ?>" name="<?php echo $this->get_field_name('email_subject'); ?>" value="<?php echo $instance['email_subject']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('success_message'); ?>"><?php _e('Success message:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('success_message'); ?>" name="<?php echo $this->get_field_name('success_message'); ?>" value="<?php echo $instance['success_message']; ?>" class="widefat" style="width: 217px" />
		</p>
		
	<?php
	}
	
	/*
	 *	Widget display
	 */
	function widget($args, $instance) {
	
		extract($args);
		
		$title = $instance['title'];
		$send_to = $instance['send_to'];
		$email_subject = $instance['email_subject'];
		$success_message = $instance['success_message'];
		
		/*
			Before widget
		*/
		echo $before_widget;
		
		if ($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
		<!-- Fast contact form -->
		<form method="post">
						
			<fieldset>
				
				<!-- Name input -->
				<input name="wb_cform_name" type="text" placeholder="<?php echo esc_attr( __('Name', 'haku') ); ?>" />
				
				<!-- Email input -->
				<input name="wb_cform_email" type="text" placeholder="<?php echo esc_attr( __('Email', 'haku') ); ?>" />
				
				<!-- Message input -->
				<textarea name="wb_cform_text" placeholder="<?php echo esc_attr( __('Message', 'haku') ); ?>"></textarea>
				
				<!-- Nonce -->
				<input name="wb_cform_nonce" type="hidden" value="<?php echo wp_create_nonce('haku_nonce'); ?>" />
				
				<!-- Variables -->
				<input name="wb_cform_var" type="hidden" value="<?php echo base64_encode( $send_to ); ?>/+/<?php echo base64_encode( $email_subject ); ?>" />
				
				<!-- Send input -->
				<input type="submit" name="wb_cform_send" value="<?php echo esc_attr( __('Send', 'haku') ); ?>" />
				
			</fieldset>
			
			<!-- Success message -->
			<p class="wb_cform_success"><strong><?php echo $success_message; ?></strong></p>
			
		</form>
		<!-- end: Fast contact form -->
		
		<?php
		/*
			After widget
		*/
		echo $after_widget;
		
	}
	
}

?>