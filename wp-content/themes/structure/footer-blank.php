<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ThemeMove
 */
?>
<?php if ( get_theme_mod( 'enable_back_to_top', enable_back_to_top ) ) { ?>
	<a class="scrollup"><i class="fa fa-angle-up"></i></a>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
