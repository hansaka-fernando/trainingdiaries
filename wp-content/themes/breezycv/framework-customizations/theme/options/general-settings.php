<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'breezycv' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'breezycv' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'theme_style'      => array(
						'label'        => esc_html__( 'Theme Style', 'breezycv' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'light',
							'label' => esc_html__( 'Light', 'breezycv' )
						),
						'left-choice'  => array(
							'value' => 'dark',
							'label' => esc_html__( 'Dark', 'breezycv' )
						),
						'value'        => 'light',
						'desc'         => esc_html__( 'Choose a theme style, light or dark.', 'breezycv' ),
						'help'         => false,
					),
					'layout_style'	=> array(
					    'type'  => 'select',
					    'value' => 'boxed',
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => __('Layout Style', 'breezycv'),
					    'desc'  => __('Choose a layout style.', 'breezycv'),
					    'choices' => array(
					        'boxed' => __('1. Boxed', 'breezycv'),
					        'fullwidth' => __('2. Full Width', 'breezycv'),
					    ),
					    'no-validate' => false,
					),
					'logo'	=> array(
						'label' => esc_html__( 'Text Logo', 'breezycv' ),
						'desc'  => esc_html__( 'Write your website title', 'breezycv' ),
						'type'  => 'text',
						'value' => esc_html(get_bloginfo( 'name' )),
						'help'    => esc_html__( 'If you want to use the logo as an image, you can upload it below, in which case this field can be left blank.', 'breezycv' ),
					),
					'subtitle'	=> array(
						'label' => esc_html__( 'Text Subtitle', 'breezycv' ),
						'desc'  => esc_html__( 'Write your website subtitle', 'breezycv' ),
						'type'  => 'text',
						'value' => '',
					),
					'photo'	=> array(
						'label' => esc_html__( 'Logo/Photo Image', 'breezycv' ),
						'desc'  => esc_html__( 'Upload the logo or photo.', 'breezycv' ),
						'type'  => 'upload',
					),
					'logo_img_height'	=> array(
						'label' => esc_html__( 'Logo/Photo Image Height', 'breezycv' ),
						'desc'  => esc_html__( 'Set logo/photo image height in the pixels. Example: 180.', 'breezycv' ),
						'type'  => 'short-text',
						'value' => '180'
					),
					'logo_img_width'	=> array(
						'label' => esc_html__( 'Logo/Photo Image Width', 'breezycv' ),
						'desc'  => esc_html__( 'Set logo/photo image width in the pixels. Example 180.', 'breezycv' ),
						'type'  => 'short-text',
						'value' => '180'
					),
					'logo_dots'      => array(
						'label'        => esc_html__( 'Disable Doted Background Under the Logo/Photo', 'breezycv' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'breezycv' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'breezycv' )
						),
						'value'        => 'no',
						'desc'         => esc_html__( 'Disable Doted Background Under the Logo/Photo.', 'breezycv' ),
						'help'         => false,
					),
					'logo_border'      => array(
						'label'        => esc_html__( 'Disable Logo/Photo Border', 'breezycv' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'breezycv' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'breezycv' )
						),
						'value'        => 'no',
						'desc'         => esc_html__( 'Disable Logo/Photo Border.', 'breezycv' ),
						'help'         => false,
					),
					'header_social'            => array(
					    'type' => 'addable-popup',
					    'value' => array(
					    ),
					    'label' => __('Social Icons', 'breezycv'),
					    'template' => '{{- title }}',
					    'popup-title' => null,
					    'size' => 'small', // small, medium, large
					    'limit' => 0, // limit the number of popup`s that can be added
					    'add-button-text' => __('Add', 'breezycv'),
					    'sortable' => true,
					    'popup-options' => array(
					    	'title' => array(
					            'label' => __('Title', 'breezycv'),
					            'type' => 'text',
					            'value' => '',
					        ),
					        'icon'    => array(
								'type'  => 'icon-v2',
								'label' => esc_html__('Choose an Icon', 'breezycv'),
							),
					        'link' => array(
					            'label' => __('Social Link', 'breezycv'),
					            'type' => 'text',
					            'value' => '',
					        ),
					    ),
					),
					'header_buttons' => array(
					    'type' => 'addable-popup',
					    'label' => __('Buttons', 'breezycv'),
					    'template' => '{{- title }}',
					    'popup-title' => null,
					    'size' => 'small',
					    'limit' => 0,
					    'add-button-text' => __('Add', 'breezycv'),
					    'sortable' => true,
					    'popup-options' => array(
					    	'title' => array(
					            'label' => __('Title', 'breezycv'),
					            'type' => 'text',
					            'value' => '',
					        ),
					        'link' => array(
					            'label' => __('URL', 'breezycv'),
					            'type' => 'text',
					            'value' => '',
					        ),
					        'target' => array(
								'type'  => 'switch',
								'label'   => esc_html__( 'Open Link in New Tab', 'breezycv' ),
								'desc'    => esc_html__( 'Select here if you want to open the linked page in a new tab', 'breezycv' ),
								'value'   => '_blank',
								'right-choice' => array(
									'value' => '_blank',
									'label' => esc_html__('Yes', 'breezycv'),
								),
								'left-choice' => array(
									'value' => '_self',
									'label' => esc_html__('No', 'breezycv'),
								),
							),
					    ),
					),
					'copyrights' => array(
						'label' => esc_html__( 'Copyrights', 'breezycv' ),
						'desc'  => false,
						'type'  => 'text',
						'value' => ''
					),
					'blog_sidebar'                    => array(
						'label'        => esc_html__( 'Show Blog Sidebar', 'breezycv' ),
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
						'desc'         => false,
						'help'         => false,
					),
					'move_effect'      => array(
						'label'        => esc_html__( 'BG Move Effect', 'breezycv' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'breezycv' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'breezycv' )
						),
						'value'        => 'no',
						'desc'         => esc_html__( 'Apply the effect of moving behind the mouse pointer to the main background', 'breezycv' ),
						'help'         => false,
					),
					'content_border_radius' => array(
						'label' => esc_html__( 'Content Area Border Radius', 'breezycv' ),
			            'type' => 'short-text',
			            'value' => '32',
			            'desc'  => esc_html__( 'Content Area Border Radius. In pixels. The setting is not relevant for full width mode.', 'breezycv' ),
					),
					'content_box_shadow'      => array(
						'label'        => esc_html__( 'Disable Content Area Box Shadow', 'breezycv' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'breezycv' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'breezycv' )
						),
						'value'        => 'no',
						'help'         => false,
						'desc'  => esc_html__( 'Disable Content Area Box Shadow. The setting is not relevant for full width mode.', 'breezycv' ),
					),
					'subpages_animations' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'subpages_animations_switcher' => array(
								'label'        => esc_html__( 'Random Animation of BreezyCV vCard Template Subpages', 'breezycv' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'On', 'breezycv' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'breezycv' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'off' => array(
								'animation_number'	=> array(
								    'type'  => 'select',
								    'value' => '1',
								    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								    'label' => __('Animation Type', 'breezycv'),
								    'desc'  => __('Choose the type of animation.', 'breezycv'),
								    'choices' => array(
								        '1' => __('1. out: move to Left | in: move from Right', 'breezycv'),
								        '2' => __('2. out: move to Right | in: move from Left', 'breezycv'),
								        '3' => __('3. out: move to Top | in: move from Bottom', 'breezycv'),
								        '4' => __('4. out: move to Bottom | in: move from Top', 'breezycv'),
								        '5' => __('5. out: fade | in: move from Right on top', 'breezycv'),
								        '6' => __('6. out: fade | in: move from Left on top', 'breezycv'),
								        '7' => __('7. out: fade | in: move from Bottom on top', 'breezycv'),
								        '8' => __('8. out: fade | in: move from Top on top', 'breezycv'),
								        '9' => __('9. out: move to Left Fade | in: move from Right Fade', 'breezycv'),
								        '10' => __('10. out: move to Right Fade | in: move from Left Fade', 'breezycv'),
								        '11' => __('11. out: move to Top Fade | in: move from Bottom Fade', 'breezycv'),
								        '12' => __('12. out: move to Bottom Fade | in: move from Top Fade', 'breezycv'),
								        '13' => __('13. out: move to Left Easing on top | in: move from Right', 'breezycv'),
								        '14' => __('14. out: move to Right Easing on top | in: move from Left', 'breezycv'),
								        '15' => __('15. out: move to Top Easing on top | in: move from Bottom', 'breezycv'),
								        '16' => __('16. out: move to Bottom Easing on top | in: move from Top', 'breezycv'),
								        '17' => __('17. out: scale Down | in: move from Right on top', 'breezycv'),
								        '18' => __('18. out: scale Down | in: move from Left on top', 'breezycv'),
								        '19' => __('19. out: scale Down | in: move from Bottom on top', 'breezycv'),
								        '20' => __('20. out: scale Down | in: move from Top on top', 'breezycv'),
								        '21' => __('21. out: scale Down | in: scale Up Down delay300', 'breezycv'),
								        '22' => __('22. out: scale Down Up | in: scale Up delay300', 'breezycv'),
								        '23' => __('23. out: move to Left on top | in: scale Up', 'breezycv'),
								        '24' => __('24. out: move to Right on top | in: scale Up', 'breezycv'),
								        '25' => __('25. out: move to Top on top | in: scale Up', 'breezycv'),
								        '26' => __('26. out: move to Bottom on top | in: scale Up', 'breezycv'),
								        '27' => __('27. out: scale Down Center | in: scale Up Center delay400', 'breezycv'),
								        '28' => __('28. out: rotate Right Side First | in: move from Right delay200 on top', 'breezycv'),
								        '29' => __('29. out: rotate Left Side First | in: move from Left delay200 on top', 'breezycv'),
								        '30' => __('30. out: rotate Top Side First | in: move from Top delay200 on top', 'breezycv'),
								        '31' => __('31. out: rotate Bottom Side First | in: move from Bottom delay200 on top', 'breezycv'),
								        '32' => __('32. out: flip Out Right | in: flip In Left delay500', 'breezycv'),
								        '33' => __('33. out: flip Out Left | in: flip In Right delay500', 'breezycv'),
								        '34' => __('34. out: flip Out Top | in: flip In Bottom delay500', 'breezycv'),
								        '35' => __('35. out: flip Out Bottom | in: flip In Top delay500', 'breezycv'),
								        '36' => __('36. out: rotate Fall on top | in: scale Up', 'breezycv'),
								        '37' => __('37. out: rotate Out Newspaper | in: rotate In Newspaper delay500', 'breezycv'),
								        '38' => __('38. out: rotate Push Left | in: move from Right', 'breezycv'),
								        '39' => __('39. out: rotate Push Right | in: move from Left', 'breezycv'),
								        '40' => __('40. out: rotate Push Top | in: move from Bottom', 'breezycv'),
								        '41' => __('41. out: rotate Push Bottom | in: ', 'breezycv'),
								        '42' => __('42. out: rotate Push Left | in: rotate Pull Right delay180', 'breezycv'),
								        '43' => __('43. out: rotate Push Right | in: rotate Pull Left delay180', 'breezycv'),
								        '44' => __('44. out: rotate Push Top | in: rotate Pull Bottom delay180', 'breezycv'),
								        '45' => __('45. out: rotate Push Bottom | in: rotate Pull Top delay180', 'breezycv'),
								        '46' => __('46. out: rotate Fold Left | in: move from Right Fade', 'breezycv'),
								        '47' => __('47. out: rotate Fold Right | in: move from Left Fade', 'breezycv'),
								        '48' => __('48. out: rotate Fold Top | in: move from Bottom Fade', 'breezycv'),
								        '49' => __('49. out: rotate Fold Bottom | in: move from Top Fade', 'breezycv'),
								        '50' => __('50. out: move to Right Fade | in: rotate Unfold Left', 'breezycv'),
								        '51' => __('51. out: move to Left Fade | in: rotate Unfold Right', 'breezycv'),
								        '52' => __('52. out: move to Bottom Fade | in: rotate Unfold Top', 'breezycv'),
								        '53' => __('53. out: move to Top Fade | in: rotate Unfold Bottom', 'breezycv'),
								        '54' => __('54. out: rotate Room Left Out on top | in: rotate Room Left In', 'breezycv'),
								        '55' => __('55. out: rotate Room Right Out on top | in: rotate Room Right In', 'breezycv'),
								        '56' => __('56. out: rotate Room Top Out on top | in: rotate Room Top In', 'breezycv'),
								        '57' => __('57. out: rotate Room Bottom Out on top | in: rotate Room Bottom In', 'breezycv'),
								        '58' => __('58. out: rotate Cube Left Out on top | in: rotate Cube Left In', 'breezycv'),
								        '59' => __('59. out: rotate Cube Right Out on top | in: rotate Cube Right In', 'breezycv'),
								        '60' => __('60. out: rotate Cube Top Out on top | in: rotate Cube Top In', 'breezycv'),
								        '61' => __('61. out: rotate Cube Bottom Out on top | in: rotate Cube Bottom In', 'breezycv'),
								        '62' => __('62. out: rotate Carousel Left Out on top | in: rotate Carousel Left In', 'breezycv'),
								        '63' => __('63. out: rotate Carousel Right Out on top | in: rotate Carousel Right In', 'breezycv'),
								        '64' => __('64. out: rotate Carousel Top Out on top | in:  rotate Carousel Top In', 'breezycv'),
								        '65' => __('65. out: rotate Carousel Bottom Out on top | in: rotate Carousel Bottom In', 'breezycv'),
								        '66' => __('66. out: rotate Sides Out | in: rotate Sides In delay200', 'breezycv'),
								        '67' => __('67. out: rotate Slide Out | in: rotate Slide In', 'breezycv'),
								    ),
								    'no-validate' => false,
								)
							),
						),
						'show_borders' => false,
					),
				)
			)
		)
	)
);