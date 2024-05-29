<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Infolist extends Widget_Base {

	public function get_name() {
		return 'breezycv-info-list';
	}

	public function get_title() {
		return __( 'Info List', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
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
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Title', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type title here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'value',
			[
				'label'       => __( 'Text/Value', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type text/value here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'info_list',
			[
				'label' => __( 'Info List', 'breezycv-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Residence', 'breezycv-widgets' ),
						'value' => __( 'USA', 'breezycv-widgets' ),
					],
					[
						'title' => __( 'e-mail', 'breezycv-widgets' ),
						'value' => __( 'email@example.com', 'breezycv-widgets' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$info_list 	= $settings['info_list'];
		$html	    = '<div class="info-list">';
		if ( $info_list ) {
			$html .= '<ul>';
			foreach ( $info_list as $item ) {
				$html .= '<li><span class="title">'.$item['title'].'</span><span class="value">'.$item['value'].'</span></li>';
			}
			$html .= '</ul>';
		}
		$html .= '</div>';
		echo $html;
	}

}
