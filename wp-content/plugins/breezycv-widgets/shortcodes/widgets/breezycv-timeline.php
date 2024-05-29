<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Timeline extends Widget_Base {

	public function get_name() {
		return 'breezycv-timeline';
	}

	public function get_title() {
		return __( 'Timeline', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-time-line';
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
			'block_title',
			[
				'label'       => __( 'Block Title', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type block title here', 'breezycv-widgets' ),
				'default' 	   => __( 'Timeline', 'breezycv-widgets' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'period',
			[
				'label'       => __( 'Period', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type period here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'title',
			[
				'label'       => __( 'Website Link', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type title here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'company',
			[
				'label'       => __( 'Company', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type title here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'text',
			[
				'label'       => __( 'Text/Description', 'breezycv-widgets' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type text/description here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'logo',
			[
				'label' => __( 'Logo', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'timeline',
			[
				'label' => __( 'Tesimonials List', 'breezycv-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'period' => __( '2016 - Current', 'breezycv-widgets' ),
						'title' => __( 'Lead Ui/Ux Designer', 'breezycv-widgets' ),
						'company' => __( 'Envato', 'breezycv-widgets' ),
						'text' => __( 'Praesent dignissim sollicitudin justo, sed elementum quam lacinia quis. Phasellus eleifend tristique posuere. Sed vitae dui nec magna.', 'breezycv-widgets' ),
					],
					[
						'period' => __( '2013 - 2016', 'breezycv-widgets' ),
						'title' => __( 'Senior Ui/Ux Designer', 'breezycv-widgets' ),
						'company' => __( 'Envato', 'breezycv-widgets' ),
						'text' => __( 'Praesent dignissim sollicitudin justo, sed elementum quam lacinia quis. Phasellus eleifend tristique posuere. Sed vitae dui nec magna.', 'breezycv-widgets' ),
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$block_title = '<div class="block-title element-title"><h2>'.$settings['block_title'].'</h2></div>';

		$timeline 	= $settings['timeline'];

		$html = '<div class="timeline clearfix">'.$block_title.'';

		if ( $timeline ) {
			foreach ( $timeline as $item ) {
				$logo = $item['logo']['url'];
				if( !empty( $logo ) ) {
					$logo_code = '<span class="item-logo"><img src="'.$logo.'" alt="'.$item['company'].'" /></span>';
				} else {
					$logo_code = '';
				}

				$html .= '<div class="timeline-item clearfix">
	                        <div class="left-part">
	                            <h5 class="item-period">'.$item['period'].'</h5>
	                            <span class="item-company">'.$item['company'].'</span>
	                            '.$logo_code.'
	                        </div>
	                        <div class="divider"></div>
	                        <div class="right-part">
	                            <h4 class="item-title">'.$item['title'].'</h4>
	                            <div>'.$item['text'].'</div>
	                        </div>
	                    </div>';
			}
		}
		

		$html .= '</div>';
		echo $html;
	}

}
