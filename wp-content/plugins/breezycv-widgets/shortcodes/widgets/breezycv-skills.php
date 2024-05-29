<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Skills extends Widget_Base {

	public function get_name() {
		return 'breezycv-skills';
	}

	public function get_title() {
		return __( 'Skills', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
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
				'default' 	   => __( 'Skills', 'breezycv-widgets' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
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
			'value',
			[
				'label'       => __( 'Value', 'breezycv-widgets' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type value here. Example: 99.', 'breezycv-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'color',
			[
				'label' => __( 'Skill Color', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#04b4e0',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
			]
		);
		$this->add_control(
			'skills',
			[
				'label' => __( 'Tesimonials List', 'breezycv-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Web Design', 'breezycv-widgets' ),
						'value' => '90',
						'color' => '#04b4e0',
					],
					[
						'title' => __( 'Print Design', 'breezycv-widgets' ),
						'value' => '80',
						'color' => '#04b4e0',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$id = uniqid( 'skills-' );

		$block_title = $settings['block_title'];

		$skills 	= $settings['skills'];

		$html = '<div class="timeline clearfix">'.$block_title.'';
		?>

		<?php if (!empty($block_title)): ?>
			<div class="block-title element-title">
				<h2><?php echo esc_html($block_title); ?></h2>
			</div>
		<?php endif; ?>

		<div id="<?php echo esc_attr($id); ?>" class="skills-info skills-first-style">
		<?php foreach ($settings['skills'] as $skill): 
			$skill_id = uniqid( 'skills' );
			?>
			<div class="clearfix">
				<h4><?php echo esc_html($skill['title']); ?></h4>
				<div class="skill-value"><?php echo esc_html($skill['value']); ?>%</div>
			</div>
			<div id="skill-<?php echo esc_attr($skill_id); ?>" data-value="<?php echo esc_attr($skill['value']); ?>" data-color="<?php echo esc_attr($skill['color']); ?>" class="skill-container">
				<div class="skill-percentage"></div>
			</div>
		<?php endforeach; ?>
		</div>

		<?php
	}

}
