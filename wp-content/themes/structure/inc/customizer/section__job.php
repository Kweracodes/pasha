<?php
/**
 * ============================================================================
 * Create sections: Project settings
 * ============================================================================
 */
function register_sections_job_settings( $wp_customize ) {
	$wp_customize->add_section( 'job_settings_section', array(
		'title'    => __( 'Job', 'thememove' ),
		'priority' => 18,
	) );
}

add_action( 'customize_register', 'register_sections_job_settings' );
/**
 * ============================================================================
 * Create controls for section: footer settings
 * ============================================================================
 */
function register_controls_for_job_settings_section( $controls ) {

	$section  = 'job_settings_section';
	$priority = 1;

	$controls[] = array(
		'type'      => 'text',
		'setting'   => 'job_archive_page_slug',
		'label'     => __( 'Job Archive Page Slug', 'thememove' ),
		'subtitle'  => __( 'Choose the page slug for job archive', 'thememove' ),
		'section'   => $section,
		'separator' => true,
		'default'   => 'company/careers',
		'priority'  => $priority ++
	);

	return $controls;
}

add_filter( 'kirki/controls', 'register_controls_for_job_settings_section' );