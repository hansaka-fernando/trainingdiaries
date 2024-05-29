<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'address' => array(
		'label'   => esc_html__('Location', 'leven-shortcodes'),
		'desc'    => esc_html__('Write your location. Example: San Francisco, S601 Townsend Street, California, USA', 'leven-shortcodes'),
		'type'    => 'text',
		'value' => esc_html__( 'San Francisco, S601 Townsend Street, California, USA', 'leven-shortcodes' ),
	),
	'map_zoom' => array(
	    'label' => esc_html__( 'Map Zoom', 'leven-shortcodes' ),
	    'desc'  => esc_html__( 'Set map zoom level', 'leven-shortcodes' ),
	    'type'  => 'slider',
	    'properties' => array(
	        'min' => 1,
	        'max' => 32,
	    ),
	    'value' => 16,
	),
);