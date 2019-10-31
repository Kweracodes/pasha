<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ThemeMove
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_theme_mod( 'favicon_image', favicon_image ); ?>">
	<link rel="apple-touch-icon" href="<?php echo get_theme_mod( 'apple_touch_icon', apple_touch_icon ); ?>"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>