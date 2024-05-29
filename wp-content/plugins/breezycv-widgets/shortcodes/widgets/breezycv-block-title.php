<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Block_Title extends Widget_Base {

	public function get_name() {
		return 'breezycv-block-title';
	}

	public function get_title() {
		return __( 'Block Title', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-archive-title';
	}

	public function get_categories() {
		return [ 'breezycv-elements' ];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Content', 'breezycv-widgets' ),
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'breezycv-widgets' ),
				 'default' 	   => __( 'Block Title', 'breezycv-widgets' ),
			  ]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$title 	= $settings['title'];
		
		$html	    = '<div class="block-title"><h2>'.$title.'</h2></div>';

		echo $html;
	}

}
