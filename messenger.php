<?php 

error_reporting(E_All);

/*
Plugin Name: Messenger Plugin
Plugin URI: tutsplus
Description: Simple Messenger
Author: Shaad
Version: 1.0
*/


//widget initialization

class Messenger extends WP_Widget {
	function __construct() {
		$params = array(
				'description' 	=> 'This is a test widget about a messenger',
				'name' 			=>'Messenger'			
				);
		parent:: __construct('Messenger', '', $params);
	}


	// display form option for widget fields

	public function form($options) {
		extract($options);
		?>

		<p>
			<label for = "<?php echo $this -> get_field_id('title'); ?>"> Title: </label>
			<input
				class = "widefat"
				id 		=	"<?php echo $this -> get_field_id('title'); ?>"
				name 	= 	"<?php echo $this -> get_field_name('title'); ?>"
				value 	= 	"<?php if(isset($title)) echo esc_attr($title); ?>" 
			/>
		</p>

		<p>
			<label for = "<?php echo $this -> get_field_id('description'); ?>"> Description: </label>
			<textarea
				class 	= "widefat"
				rows 	= "10"
				id 		=	"<?php echo $this -> get_field_id('description'); ?>"
				name 	= 	"<?php echo $this -> get_field_name('description'); ?>"><?php if(isset($description)) echo esc_attr($description); ?></textarea>
		</p>

	<?php

	}


// result of widget in front end

	public function widget($args, $options){
		extract($args);
		extract($options);

		$title 			= apply_filters('widget_title', $title);
		$description 	= apply_filters('widget_description', $description);

		if(empty($title)) {$title = 'My Status';}

		echo $before_widget;
			echo $before_title . $title . $after_title;
			echo "<p> $description </p>";
		echo $after_widget;
	}
}

add_action('widgets_init', 'si_register_messenger');

function si_register_messenger() {
	register_widget('Messenger');
}


?>