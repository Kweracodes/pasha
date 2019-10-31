<?php

add_filter( 'thememove_import_demos', 'tm_structure_import_demos' );

function tm_structure_import_demos() {
	return array(
		'thememove01' => array(
			'screenshot' => THEME_ROOT . '/screenshot.jpg',
			'name'       => PARENT_THEME_NAME
		)
	);
}

add_filter( 'thememove_import_style', 'tm_structure_import_style' );

function tm_structure_import_style() {
	return array(
		'title_color'  => '#222222',
		'link_color'   => '#FBD232',
		'notice_color' => '#FBD232',
		'logo'         => THEME_ROOT . '/images/logo.png'
	);
}

add_filter('thememove_import_package_url', 'tm_structure_import_package_url');

function tm_structure_import_package_url() {
	return 'http://api.insightstud.io/update/structure/import/structure-thememove01.zip';
}

//add_filter( 'thememove_import_generate_thumb', 'tm_structure_import_generate_thumb' );
//
//function tm_structure_import_generate_thumb() {
//	return true;
//}
