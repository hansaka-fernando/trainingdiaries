<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'theme_customization' => array(
		'title'   => esc_html__( 'Theme Design Light', 'breezycv' ),
		'type'    => 'tab',
		'options' => array(
			'body_background_gradient' => array(
				'title'   => esc_html__( 'Body Background Gradient', 'breezycv' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'body_gradient_from' => array(
						'label' => esc_html__( 'Gradient Color From', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#edf3f7',
						'palettes' => array( '#edf3f7', '#f2f7f9', '#04b4e0', '#0b7080', '#9d2bf3', '#fca072', '#21e1ae', '#fe6d72' ),
						'desc'  => esc_html__( 'Select the color.', 'breezycv' ),
					),
					'body_gradient_to' => array(
						'label' => esc_html__( 'Gradient Color To', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#edf3f7',
						'palettes' => array( '#edf3f7', '#f2f7f9', '#04b4e0', '#0ba376', '#5050f5', '#fca072', '#09aeea', '#fea621' ),
						'desc'  => esc_html__( 'Select the color.', 'breezycv' ),
					),
				)
			),
			'page_content_area' => array(
				'title'   => esc_html__( 'Page Content Area Gradient', 'breezycv' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'pc_gradient_from' => array(
						'label' => esc_html__( 'Gradient Color From', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#0b7080',
						'palettes' => array( '#04b4e0', '#0b7080', '#9d2bf3', '#fca072', '#21e1ae', '#fe6d72' ),
						'desc'  => esc_html__( 'Select the color.', 'breezycv' ),
					),
					'pc_gradient_to' => array(
						'label' => esc_html__( 'Gradient Color To', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#0ba376',
						'palettes' => array( '#04b4e0', '#0ba376', '#5050f5', '#fca072', '#09aeea', '#fea621' ),
						'desc'  => esc_html__( 'Select the color.', 'breezycv' ),
					),
				)
			),
			'theme_style_options' => array(
				'title'   => esc_html__( 'Theme Design', 'breezycv' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'content_max_width' => array(
						'label' => esc_html__( 'Content Area Max Width', 'breezycv' ),
			            'type' => 'short-text',
			            'value' => '1280',
			            'desc'  => esc_html__( 'Maximum width of the area with content. In pixels.', 'breezycv' ),
					),
					'main_color' => array(
						'label' => esc_html__( 'Main Theme Color', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#0ba376',
						'palettes' => array( '#0ba376', '#04b4e0', '#5e2fd6', '#fca072', '#09aeea', '#fea621' ),
						'desc'  => esc_html__( 'Select main color.', 'breezycv' ),
					),
					'content_bg_color' => array(
						'label' => esc_html__( 'Page Content Wrapper Background Color ', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#fff',
						'palettes' => array( '#fff', '#fcfcfc' ),
						'desc'  => esc_html__( 'Select main color.', 'breezycv' ),
					),
					'sidebar_bg_color' => array(
						'label' => esc_html__( 'Blog Sidebar Background Color', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#fff',
						'palettes' => array( '#ffffff', '#333333' ),
						'desc'  => esc_html__( 'Select blog pages sidebar background color.', 'breezycv' ),
					),
					'body_text_color' => array(
						'label' => esc_html__( 'Body Text Color', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#555',
						'palettes' => array( '#555', '#d5d5d5' ),
						'desc'  => esc_html__( 'Select Body Text color.', 'breezycv' ),
					),
					'headings_color' => array(
						'label' => esc_html__( 'Headings Color', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#222',
						'palettes' => array( '#222', '#f5f5f5' ),
						'desc'  => esc_html__( 'Select Headings color.', 'breezycv' ),
					),
					'links_color' => array(
						'label' => esc_html__( 'Links Color', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#0099CC',
						'palettes' => array( '#0099CC', '#0ba376', '#04b4e0', '#5e2fd6', '#fca072', '#09aeea', '#fea621' ),
						'desc'  => esc_html__( 'Select links color.', 'breezycv' ),
					),
					'links_hover_color' => array(
						'label' => esc_html__( 'Links Hover Color', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#006699',
						'desc'  => esc_html__( 'Select links hover color.', 'breezycv' ),
					),
				)
			),
			'page_titles' => array(
				'title'   => esc_html__( 'Page Titles', 'breezycv' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'cp_title_general_bg_color' => array(
						'label' => esc_html__( 'Doted Background Color', 'breezycv' ),
						'type'  => 'color-picker',
						'value' => '#0ba376',
						'palettes' => array( '#0ba376', '#04b4e0', '#5e2fd6', '#fca072', '#09aeea', '#fea621' ),
						'desc'  => esc_html__( 'Select the background color of the title.', 'breezycv' ),
					),
					'cp_title_general_title_font' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Poppins',
					        'style' => 'normal',
					        'weight' => 600,
					        'subset' => 'latin-ext',
					        'variation' => '600',
					        'size' => 32,
					        'line-height' => 48,
					        'letter-spacing' => 0,
					        'color' => '#222'
					    ),
					    'components' => array(
					        'family'         => true,
					        'size'           => true,
					        'line-height'    => false,
					        'letter-spacing' => true
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Title Font', 'breezycv'),
					    'desc'  => false,
					    'help'  => false,
					),
				)
			),
		)
	)
);