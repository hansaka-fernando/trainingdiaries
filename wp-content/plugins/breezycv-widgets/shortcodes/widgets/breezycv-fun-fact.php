<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Fun_Fact extends Widget_Base {

	public function get_name() {
		return 'breezycv-fun-fact';
	}

	public function get_title() {
		return __( 'Fun Fact', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-nerd-wink';
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
			'icon',
			[
				'label' => __( 'Icon', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-heart',
				],
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title of the Fun Fact', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'breezycv-widgets' ),
				 'default' 	   => __( 'Happy Clients', 'breezycv-widgets' ),
			  ]
		);

		$this->add_control(
			'value',
			  [
				 'label'       => __( 'Value/Text of the Fun Fact', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type value/text here', 'breezycv-widgets' ),
				 'default' 	   => __( '999+', 'breezycv-widgets' ),
			  ]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$title 	= $settings['title'];
		$icon = $settings['icon']['value'];
		$value = $settings['value'];

		$html = '<div class="fun-fact">
	                <i class="'.$icon.'"></i>
	                <h4>'.$title.'</h4>
	                <span class="fun-fact-block-value">'.$value.'</span>
	            </div>';

		echo $html;
	}

}
