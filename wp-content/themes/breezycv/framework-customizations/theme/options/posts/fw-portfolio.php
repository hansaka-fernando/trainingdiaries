<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$settings_page_link = is_admin() ? menu_page_url( fw()->backend->_get_settings_page_slug(), false ) : '#';
$options            = array(
	'main' => array(
		'title'   => esc_html__( 'Project Options', 'breezycv' ),
		'type'    => 'box',
		'options' => array(
			'portfolio_type'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'value'        => array(
				'portfolio_type_picker' => 'standard',
				),
				'picker'       => array(
					'portfolio_type_picker' => array(
						'label'   => esc_html__( 'Portfolio Type', 'breezycv' ),
						'type'    => 'radio',
						'choices' => array(
							'standard' => esc_html__( 'Standard', 'breezycv' ),
							'lbimage'  => esc_html__( 'Lightbox Featured Image', 'breezycv' ),
							'lbvideo'  => esc_html__( 'Lightbox Video', 'breezycv' ),
							'lbaudio'  => esc_html__( 'Lightbox Audio', 'breezycv' ),
							'direct'   => esc_html__( 'Direct URL', 'breezycv' ),
						),
					)
				),
				'choices'      => array(
					'standard'  => array(
						'pf_client'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Client', 'breezycv' ),
						),
						'pf_site_text'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL Text', 'breezycv' ),
						),
						'pf_site_url'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL', 'breezycv' ),
						),
						'pf_site_text_second'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL Text 2', 'breezycv' ),
						),
						'pf_site_url_second'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL 2', 'breezycv' ),
						),
						'pf_site_text_third'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL Text 3', 'breezycv' ),
						),
						'pf_site_url_third'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL 3', 'breezycv' ),
						),
						'pf_date'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Date', 'breezycv' ),
						),
						'pf_description' => array(
							'label' => esc_html__( 'Short Description', 'breezycv' ),
							'type'  => 'wp-editor',
							'value' => '',
							'desc'  => false,
							'help'  => false,
							'reinit' => true,
						),
						'pf_tags'            => array(
							'label'  => esc_html__( 'Project Tags', 'breezycv' ),
							'type'   => 'addable-option',
							'option' => array(
								'type' => 'text',
							),
							'value'  => array(),
							'desc'   => false
						),
						'pf_gallery_grid' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'pf_gallery_grid_picker' => array(
									'label'        => esc_html__( 'Show Gallery as Grid', 'breezycv' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'on',
										'label' => esc_html__( 'On', 'breezycv' )
									),
									'left-choice'  => array(
										'value' => 'off',
										'label' => esc_html__( 'Off', 'breezycv' )
									),
									'value'        => 'off',
								)
							),
							'choices'      => array(
								'on' => array(
									'pf_gallery_grid_columns'	=> array(
										'label'   => esc_html__( 'Gallery Grid', 'breezycv' ),
										'type'    => 'radio',
										'value'   => 'two-columns',
										'desc'    => false,
										'choices' => array(
											'one-column' => esc_html__( '1 Column', 'breezycv' ),
											'two-columns' => esc_html__( '2 Columns', 'breezycv' ),
											'three-columns' => esc_html__( '3 Columns', 'breezycv' ),
										),
									),
								),
							),
							'show_borders' => false,
						),
						'pf_use_ajax' => array(
							'label'        => esc_html__( 'Use Ajax to load the project', 'breezycv' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'breezycv' )
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'breezycv' )
							),
							'value'        => 'yes',
							'desc'         => esc_html__( 'If you disable this option, the project will open as a separate page. If this option is enabled, the project will be loaded in the form of an animated window, above the main content.', 'breezycv' ),
							'help'         => false,
						),
					),
					'lbvideo'  => array(
						'videourl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Video URL', 'breezycv' ),
						)
					),
					'lbaudio'  => array(
						'audiourl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Audio URL', 'breezycv' ),
						)
					),
					'direct'  => array(
						'directurl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Direct URL', 'breezycv' ),
						)
					),
				),
				'show_borders' => false,
			),
		),
	),
);
