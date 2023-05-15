<?php 
function get_img($fileName){
	return get_bloginfo('template_url')."/assets/images/theme/{$fileName}";
}

function get_icon($iconName){
	echo file_get_contents(get_template_directory() . "/assets/images/icons/{$iconName}.svg");
}