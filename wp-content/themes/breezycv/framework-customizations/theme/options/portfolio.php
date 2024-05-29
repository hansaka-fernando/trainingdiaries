<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'portfolio' => array(
		'title'   => esc_html__( 'Portfolio', 'breezycv' ),
		'type'    => 'tab',
		'options' => array(
			'portfolio_settings' => array(
				'title'   => esc_html__( 'Portfolio Settings', 'breezycv' ),
				'type'    => 'box',
				'options' => array(
					'portfolio_titles' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_titles_switcher' => array(
								'label'        => esc_html__( 'Custom Portfolio Titles', 'breezycv' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'breezycv' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'breezycv' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'on' => array(
								'description_title'	=> array(
									'label' => esc_html__( 'Description Title', 'breezycv' ),
									'desc'  => esc_html__( 'Description title.', 'breezycv' ),
									'type'  => 'text',
									'value' => esc_html__( 'Description', 'breezycv' ),
								),
								'technology_title'	=> array(
									'label' => esc_html__( 'Technology Title', 'breezycv' ),
									'desc'  => esc_html__( 'Technology title.', 'breezycv' ),
									'type'  => 'text',
									'value' => esc_html__( 'Technology', 'breezycv' ),
								),
								'share_title'	=> array(
									'label' => esc_html__( 'Share Title', 'breezycv' ),
									'desc'  => esc_html__( 'Share title.', 'breezycv' ),
									'type'  => 'text',
									'value' => esc_html__( 'Share', 'breezycv' ),
								),
							),
						),
						'show_borders' => false,
					),
					'portfolio_desc_sidebar' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_sidebar_switcher' => array(
								'label'        => esc_html__( 'Display a Sidebar with a Description, Tags and Share Links.', 'breezycv' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'breezycv' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'breezycv' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'on' => array(
								'portfolio_desc_fields' => array(
								    'type'  => 'checkboxes',
								    'value' => array(
								        'client' => true,
								        'site' => true,
								        'date' => true,
								        'tags' => true,
								        'share' => true,
								    ),
								    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								    'label' => esc_html__('Display Fields and Blocks in the Description Block', 'breezycv'),
								    'desc'  => esc_html__('These settings apply only to the standard project type.', 'breezycv'),
								    'choices' => array(
								        'client' => esc_html__('Client', 'breezycv'),
								        'site' => esc_html__('Site', 'breezycv'),
								        'date' => esc_html__('Date', 'breezycv'),
								        'tags' => esc_html__('Tags', 'breezycv'),
								        'share' => esc_html__('Share Buttons', 'breezycv'),
								    ),
								    'inline' => false,
								),
								'portfolio_sidebar_position' => array(
									'label'        => esc_html__( 'Display Sidebar on the Left or Right Side', 'breezycv' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'right',
										'label' => esc_html__( 'Right', 'breezycv' )
									),
									'left-choice'  => array(
										'value' => 'left',
										'label' => esc_html__( 'Left', 'breezycv' )
									),
									'value'        => 'right',
								)
							),
						),
						'show_borders' => false,
					),
					'portfolio_load_more' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_load_more_switcher' => array(
								'label'        => esc_html__( 'Load More Feature', 'breezycv' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'breezycv' )
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
								'projects_number'	=> array(
									'label' => esc_html__( 'Number of Projects Displayed by Default', 'breezycv' ),
									'type'  => 'text',
									'value' => '9',
								),
								'button_text'	=> array(
									'label' => esc_html__( 'Load More Button Text', 'breezycv' ),
									'type'  => 'text',
									'value' => esc_html__( 'Load More', 'breezycv' ),
								),
								'button_text_loading'	=> array(
									'label' => esc_html__( 'Load More Button Text on Loading', 'breezycv' ),
									'type'  => 'text',
									'value' => esc_html__( 'Loading...', 'breezycv' ),
								),

							),
						),
						'show_borders' => false,
					)
				)
			),
		)
	)
);
