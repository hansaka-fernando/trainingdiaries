<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( function_exists( 'breezycv_tracking_wp_head' ) ) {
	$options = array(
		'custom_css_js' => array(
			'title'   => esc_html__( 'Custom CSS and JS', 'breezycv' ),
			'type'    => 'tab',
			'options' => array(
				'custom_css_js_fields' => array(
					'title'   => esc_html__( 'Custom CSS and JS', 'breezycv' ),
					'type'    => 'box',
					'options' => array(
						'custom_styles'	=> array(
							'label' => esc_html__( 'Custom CSS', 'breezycv' ),
							'desc'  => esc_html__( 'Add your custom CSS styles.', 'breezycv' ),
							'type'  => 'textarea',
							'value' => '',
						),
						'external_styles'	=> array(
							'label' => esc_html__( 'External CSS', 'breezycv' ),
							'desc'  => esc_html__( 'Add your custom external (.css) file. Example: &lt;link rel="stylesheet" type="text/css" href="yourstyle.css"&gt;', 'breezycv' ),
							'type'  => 'textarea',
							'value' => '',
						),
						'external_js'	=> array(
							'label' => esc_html__( 'External JS', 'breezycv' ),
							'desc'  => esc_html__( 'Add your custom external (.js) file. Example: &lt;script src="yourscript.js"&gt;&lt;/script&gt;', 'breezycv' ),
							'type'  => 'textarea',
							'value' => '',
						),
					)
				)
			)
		)
	);
}
