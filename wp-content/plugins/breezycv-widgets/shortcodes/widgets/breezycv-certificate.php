<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Certificate extends Widget_Base {

	public function get_name() {
		return 'breezycv-certificate';
	}

	public function get_title() {
		return __( 'Certificate', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
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
				 'default' 	   => '',
			  ]
		);

		$this->add_control(
			'membership',
			  [
				 'label'       => __( 'Membership ID', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type Membership ID here', 'breezycv-widgets' ),
				 'default' 	   => '',
			  ]
		);

		$this->add_control(
			'date',
			  [
				 'label'       => __( 'Date of receipt of the certificate', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type Date here', 'breezycv-widgets' ),
				 'default' 	   => '',
			  ]
		);

		$this->add_control(
			'logo',
			[
				'label' => __( 'Company Logo', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Certificate Image', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$title = $settings['title'];
		$membership = $settings['membership'];
		$date = $settings['date'];
		$logo = $settings['logo']['url'];
		$img = $settings['image']['url'];
		?>

		<?php if( !empty( $img ) ) : ?>
		<a href="<?php echo esc_url($img); ?>" class="lightbox">
		<?php endif; ?>
		<div class="certificate-item clearfix">
		    <div class="certi-logo">
		        <?php if( !empty( $logo ) ) : ?>
		        <img src="<?php echo esc_url($logo); ?>" alt="<?php esc_attr_e('logo', 'breezycv-widgets'); ?>">
		        <?php endif; ?>
		    </div>
		    <div class="certi-content">
		        <div class="certi-title">
		            <h4><?php echo esc_html($title); ?></h4>
		        </div>
		        <div class="certi-id">
		            <span><?php echo esc_html($membership); ?></span>
		        </div>
		        <div class="certi-date">
		            <span><?php echo esc_html($date); ?></span>
		        </div>
		        <div class="certi-company">
		            <span></span>
		        </div>
		    </div>
		</div>
		<?php if( !empty( $img ) ) : ?>
		</a>
		<?php endif;
	}

}
