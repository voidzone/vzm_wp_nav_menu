<?php
/*
	Name: [VZM] Wordpress Nav Menu
	Author: Tim Milligan
	Description: Adds Support for Wordpress Nav Menus with Theme Locations 
	Version: 1.1
	Class: vzm_wp_nav_menu
*/

class vzm_wp_nav_menu extends thesis_box {
	protected function translate() {
		$this->title = __('VZM WP Nav Menu', 'vzm');
		$this->name = __('vzm_wp_nav_menu', 'vzm');
	}
	
	protected function construct() {
		register_nav_menu($this->_id , $this->name);
	}
	
	protected function options() {
		return array (
			'location' => array(
				'type' => 'text',
				'width' => 'long',
				'label' => sprintf(__('Theme Location: %s', 'vzm'), $this->_id),
				'tooltip' => __('For demostation purposes only. The Theme Location cannot be changed.', 'vzm'),
				'default' => $this->_id
			)
		);
	}

	public function html($args = false) {
		extract($args = is_array($args) ? $args : array());
		$tab = str_repeat("\t", !empty($depth) ? $depth : 0);
		
		if (has_nav_menu($this->_id)) {
			echo $tab . wp_nav_menu(array('theme_location' => $this->_id));
		}
	}
}
