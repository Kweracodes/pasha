<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ThemeMove
 */
?>
<div class="bottom-wrapper">
	<?php if ( is_active_sidebar( 'footer' ) ) { ?>
		<footer <?php footer_class(); ?> role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<?php dynamic_sidebar( 'footer' ); ?>
						<div class="social">
							<?php wp_nav_menu( array( 'theme_location' => 'social', 'fallback_cb' => false ) ); ?>
						</div>
					</div>
					<div class="col-md-4">
						<?php dynamic_sidebar( 'footer2' ); ?>
					</div>
					<div class="col-md-4">
						<?php dynamic_sidebar( 'footer3' ); ?>
					</div>
				</div>
			</div>
		</footer><!--/footer-->
	<?php } ?>
	<?php if ( get_theme_mod( 'footer_copyright_enable', footer_copyright_enable ) ) { ?>
		<div class="copyright">
			<div class="container">
				<?php echo html_entity_decode( get_theme_mod( 'copyright_text', copyright_text ) ); ?>
			</div>
		</div>
	<?php } ?>
</div>
</div><!--/#page-->
<?php if ( get_theme_mod( 'enable_back_to_top', enable_back_to_top ) ) { ?>
	<a class="scrollup"><i class="fa fa-angle-up"></i></a>
<?php } ?>
<nav id="menu">
	<?php Structure::top_menu() ?>
</nav>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$(function() {
			$('nav#menu').mmenu();
		});
	});
</script>
<?php wp_footer(); ?>
</body>
</html>
