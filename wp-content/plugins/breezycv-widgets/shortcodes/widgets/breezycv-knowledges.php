<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Knowledges extends Widget_Base {

	public function get_name() {
		return 'breezycv-knowledges';
	}

	public function get_title() {
		return __( 'Knowledges', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-check-circle';
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
			'knowledge',
			[
				'label'       => __( 'Knowledge', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type knowledge here', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'knowledges',
			[
				'label' => __( 'Knowledges', 'breezycv-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'knowledge' => __( 'Marketing', 'breezycv-widgets' ),
					],
					[
						'knowledge' => __( 'Social Media', 'breezycv-widgets' ),
					],
					[
						'knowledge' => __( 'Communication', 'breezycv-widgets' ),
					],
					[
						'knowledge' => __( 'Social Networking', 'breezycv-widgets' ),
					],
				],
				'title_field' => '{{{ knowledge }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();
		?>

		<ul class="knowledges">
	        <?php foreach ($settings['knowledges'] as $knowledge): 
				?>
				<li><?php echo wp_kses_post($knowledge['knowledge']); ?></li>
			<?php endforeach; ?>
      	</ul>
        <?php
	}

}
