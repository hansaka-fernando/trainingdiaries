<?php

namespace Breezycv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Breezycv_Pricing extends Widget_Base {

	public function get_name() {
		return 'breezycv-pricing';
	}

	public function get_title() {
		return __( 'Pricing', 'breezycv-widgets' );
	}

	public function get_icon() {
		return 'eicon-price-table';
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
			'highlight',
			[
				'label' => __( 'Highlighted', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'breezycv-widgets' ),
				'label_off' => __( 'No', 'breezycv-widgets' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Plan name', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type plane name here', 'breezycv-widgets' ),
				 'default' 	   => __( 'Basic', 'breezycv-widgets' ),
			  ]
		);

		$this->add_control(
			'price',
			  [
				 'label'       => __( 'Price', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type price here', 'breezycv-widgets' ),
				 'default' 	   => __( '$128', 'breezycv-widgets' ),
			  ]
		);

		$this->add_control(
			'price_desc',
			  [
				 'label'       => __( 'Price Small Description / Period', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type text here', 'breezycv-widgets' ),
				 'default' 	   => __( 'per month', 'breezycv-widgets' ),
			  ]
		);

		$this->add_control(
			'button_text',
			  [
				 'label'       => __( 'Button Text', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type button text here', 'breezycv-widgets' ),
				 'default' 	   => __( 'Free Trial', 'breezycv-widgets' ),
			  ]
		);

		$this->add_control(
			'button_url',
			[
				'label' => __( 'Link', 'breezycv-widgets' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'breezycv-widgets' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
				],
			]
		);

		$this->add_control(
			'button_type',
			[
				'label' => __( 'Button Type: Primary', 'breezycv-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'breezycv-widgets' ),
				'label_off' => __( 'No', 'breezycv-widgets' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'description_item',
			  [
				 'label'       => __( 'Item', 'breezycv-widgets' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type description item here', 'breezycv-widgets' ),
				 'default' 	   => __( 'Unlimited traffic', 'breezycv-widgets' ),
			  ]
		);
		
		$this->add_control(
			'description',
			[
				'label' => __( 'Description Items', 'breezycv-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'description_item' => __( 'Unlimited traffic', 'breezycv-widgets' ),
					],
					[
						'description_item' => __( 'Unlimited disk space', 'breezycv-widgets' ),
					],
				],
				'title_field' => '{{{ description_item }}}',
			]
		);



		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();

		$highlight = $settings['highlight'];

		if ($highlight == "yes") {
			$highlight = "highlight";
		} else {
			$highlight = "";
		}

		$title = $settings['title'];

		$price = $settings['price'];

		$price_desc = $settings['price_desc'];

		$button_text = $settings['button_text'];

		$button_url = $settings['button_url']['url'];

		$button_type = $settings['button_type'];

		$description = $settings['description'];

		$target = $settings['button_url']['is_external'] ? ' target="_blank"' : '';

		$nofollow = $settings['button_url']['nofollow'] ? ' rel="nofollow"' : '';
		?>
		<div class="fw-pricing">
			<div class="fw-package <?php echo esc_attr($highlight); ?>">
				<?php if (! empty($title)) { ?>
			        <div class="fw-heading-row">
			        	<span><?php echo wp_kses_post($title); ?></span>
			        </div>
		    	<?php } ?>
		        
		        <div class="fw-pricing-row">
		        	<?php if (! empty($price)) { ?>
		        	<span><?php echo wp_kses_post($price); ?></span>
		        	<?php } ?>

		        	<?php if (! empty($price_desc)) { ?>
		        	<small><?php echo wp_kses_post($price_desc); ?></small>
		        	<?php } ?>
		        </div>
		        
		        <?php if (! empty($button_text)) { 


		        	if ($button_type == "yes") {
		        		$button_type = "primary";
		        	} else {
		        		$button_type = "secondary";
		        	}
		        	?>

			        <div class="fw-button-row">
			        	<a href="<?php echo wp_kses_post($button_url); ?>" <?php echo wp_kses_post($target); ?> <?php echo wp_kses_post($nofollow); ?> class="btn btn-<?php echo esc_attr($button_type); ?>"><?php echo wp_kses_post($button_text); ?></a>
			        </div>
			    <?php } ?>

			    <?php if ( $description ) {
					foreach ( $description as $item ) {
						$desc_text = $item['description_item']; ?>

						<div class="fw-default-row"><?php echo wp_kses_post($desc_text); ?></div>
						
					<?php
					}
				}
				?>

		    </div>
		</div>
	    <?php
	}

}
