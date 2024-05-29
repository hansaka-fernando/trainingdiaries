<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( function_exists( 'breezycv_tracking_wp_head' ) ) {
	$options = array(
		'seo' => array(
			'title'   => esc_html__( 'SEO', 'breezycv' ),
			'type'    => 'tab',
			'options' => array(
				'tracking_code' => array(
					'title'   => esc_html__( 'SEO', 'breezycv' ),
					'type'    => 'box',
					'options' => array(
						'head_tracking_code'	=> array(
							'label' => esc_html__( 'Tracking Code (head)', 'breezycv' ),
							'desc'  => esc_html__( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing head tag.', 'breezycv' ),
							'type'  => 'textarea',
							'value' => '',
						),
						'body_tracking_code'	=> array(
							'label' => esc_html__( 'Tracking Code (body)', 'breezycv' ),
							'desc'  => esc_html__( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag.', 'breezycv' ),
							'type'  => 'textarea',
							'value' => '',
						),
					)
				),
			)
		)
	);
}
