<?php
/**
 * ============================================================================
 * Create sections: Project settings
 * ============================================================================
 */
function register_sections_project_settings( $wp_customize ) {
	$wp_customize->add_section( 'project_settings_section', array(
		'title'    => __( 'Project', 'thememove' ),
		'priority' => 18,
	) );
}

add_action( 'customize_register', 'register_sections_project_settings' );
/**
 * ============================================================================
 * Create controls for section: footer settings
 * ============================================================================
 */
function register_controls_for_project_settings_section( $controls ) {

	$section  = 'project_settings_section';
	$priority = 1;

	$controls[] = array(
		'type'      => 'text',
		'setting'   => 'project_archive_page_slug',
		'label'     => __( 'Project Archive Page Slug', 'thememove' ),
		'subtitle'  => __( 'Choose the page slug for project archive', 'thememove' ),
		'section'   => $section,
		'separator' => true,
		'default'   => 'all-projects',
		'priority'  => $priority ++
	);

	return $controls;
}

add_filter( 'kirki/controls', 'register_controls_for_project_settings_section' );