<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Testimonials extends Widget_Base {

	public function get_name() {
		return 'breezycv-testimonials';
	}

	public function get_title() {
		return __( 'Testimonials', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
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
				'label'       => __( 'Block Title', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type block title here', 'breezycv-widgets' ),
				'default' 	   => __( 'Testimonials', 'breezycv-widgets' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'quote',
			[
				'label'       => __( 'Quote', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type quote here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'name',
			[
				'label'       => __( 'Name', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type name here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'company',
			[
				'label'       => __( 'Company', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type company here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'link',
			[
				'label'       => __( 'Website Link', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type company here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'target',
			[
				'label' => __( 'Open Website Link in New Tab', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'breezycv-widgets' ),
				'label_off' => __( 'No', 'breezycv-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'testimonials',
			[
				'label' => __( 'Tesimonials List', 'breezycv-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'quote' => __( 'Testimonial Text', 'breezycv-widgets' ),
						'name' => __( 'Julia Hickman', 'breezycv-widgets' ),
						'company' => __( 'Omni Source', 'breezycv-widgets' ),
						'link' => __( 'http://example.com', 'breezycv-widgets' ),
					],
					[
						'quote' => __( 'Testimonial Text', 'breezycv-widgets' ),
						'name' => __( 'Robert Watkins', 'breezycv-widgets' ),
						'company' => __( 'Endicott Shoes', 'breezycv-widgets' ),
						'link' => __( 'http://example.com', 'breezycv-widgets' ),
					],
					[
						'quote' => __( 'Testimonial Text', 'breezycv-widgets' ),
						'name' => __( 'Kristin Carroll', 'breezycv-widgets' ),
						'company' => __( 'Helping Hand', 'breezycv-widgets' ),
						'link' => __( 'http://example.com', 'breezycv-widgets' ),
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Slider Settings', 'breezycv-widgets' ),
			]
		);

		$this->add_control(
			'desktop',
			[
				'label'       => __( 'Items on the front: Desktop', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Example: 2', 'breezycv-widgets' ),
				'default' 	   => __( '2', 'breezycv-widgets' ),
			]
		);

		$this->add_control(
			'tablet',
			[
				'label'       => __( 'Items on the front: Tablet', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Example: 2', 'breezycv-widgets' ),
				'default' 	   => __( '2', 'breezycv-widgets' ),
			]
		);

		$this->add_control(
			'mobile',
			[
				'label'       => __( 'Items on the front: Mobile', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Example: 1', 'breezycv-widgets' ),
				'default' 	   => __( '1', 'breezycv-widgets' ),
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => __( 'Infinity Loop', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'breezycv-widgets' ),
				'label_off' => __( 'No', 'breezycv-widgets' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'breezycv-widgets' ),
				'label_off' => __( 'No', 'breezycv-widgets' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$id = $this->get_id();

		$settings = $this->get_settings();

		$block_title = '<div class="block-title element-title"><h2>'.$settings['title'].'</h2></div>';

		$testimonials_list = $settings['testimonials'];

		$loop = $settings['loop'];

		if ( $loop == 'yes' ) {
			$loop_value = 'loop-on';
		} else {
			$loop_value = 'loop-off';
		}

		$autoplay = $settings['autoplay'];

		if ( $autoplay == 'yes' ) {
			$autoplay_value = 'autoplay-on';
		} else {
			$autoplay_value = 'autoplay-off';
		}

		$html	    = ''.$block_title.'
		<div id="testimonials_'.$id.'" class="testimonials owl-carousel '.$loop_value.' '.$autoplay_value.'" data-mobile-items="'.$settings['mobile'].'" data-tablet-items="'.$settings['tablet'].'" data-items="'.$settings['desktop'].'">';
		if ( $testimonials_list ) {
			foreach ( $testimonials_list as $item ) {
				$target = $item['target'];
				if ( $target == 'yes' ) {
					$target_value = '_blank';
				} else {
					$target_value = '_self';
				}

				$link = $item['link'];

				if ($link != '') {
					$company = '<h5 class="company"><a href="'.$link.'" target="'.$target_value.'">'.$item['company'].'</a></h5>';
				} else {
					$company = '<h5 class="company">'.$item['company'].'</h5>';
				}

				$img = $item['image']['url'];

				if ($img != '') {
					$img_code = '<div class="img"><img src="'.$item['image']['url'].'" alt="'.$item['company'].'"></div>';
				} else {
					$img_code = '<div style="padding-top: 20px;"></div>';
				}

				$html .= '<div class="testimonial">
                  '.$img_code.'
                  <div class="text">
                    <p>'.$item['quote'].'</p>
                  </div>

                  <div class="author-info">
                    <h4 class="author">'.$item['name'].'</h4>
                    '.$company.'
                    <div class="icon">
                      <i class="fa fa-quote-right"></i>
                    </div>
                  </div>
                </div>';
			}
		}
		$html .= '</div>';
		echo $html;
	}

}
