<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Home_Page_First extends Widget_Base {

	public function get_name() {
		return 'breezycv-home-page-first';
	}

	public function get_title() {
		return __( 'Home Page First', 'breezycv-widgets' );
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
				 'default' 	   => get_bloginfo( 'name' ),
			  ]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type subtitle here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitles',
			[
				'label' => __( 'Subtitles', 'breezycv-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'subtitle' => __( 'Web Designer', 'breezycv-widgets' ),
					],
					[
						'subtitle' => __( 'Frontend-developer', 'breezycv-widgets' ),
					],
				],
				'title_field' => '{{{ subtitle }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		?>

		<div class="section-content vcentered home-page-first-style">

            <div class="row">
              	<div class="col-sm-12 col-md-12 col-lg-12">
	                <div class="title-block">
		                <h2><?php echo wp_kses_post($settings['title']); ?></h2>
		                <div class="owl-carousel text-rotation">   


		                	<?php foreach ($settings['subtitles'] as $subtitle): 
								?>
								<div class="item">
			                    	<div class="sp-subtitle"><?php echo wp_kses_post($subtitle['subtitle']); ?></div>
			                    </div>
							<?php endforeach; ?>    
		                </div>
	                </div>
              	</div>
            </div>
        </div>

        <?php
	}

}
