<?php
/*
Template Name: Blank Page
*/
$thememove_page_layout_private = get_post_meta( get_the_ID(), "thememove_page_layout_private", true );
if ( $thememove_page_layout_private != 'default' ) {
	$layout = get_post_meta( get_the_ID(), "thememove_page_layout_private", true );
} else {
	$layout = get_theme_mod( 'site_layout', site_layout );
}
get_header( 'blank' );
?>
<?php if ( $layout == 'full-width' ) { ?>
	<div class="content-wrapper">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
<?php } else { ?>
	<div class="content-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php get_footer( 'blank' ); ?>