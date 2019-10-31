<?php
extract( shortcode_atts( array(
	'same_cat'               => '',
	'project_archive_button' => ''
), $atts ) );
if ( $project_archive_button != 'false' ) {
	$col_left_right = 'col-md-5';
} else {
	$col_left_right = 'col-md-6';
}
global $post;
?>

<div class="tm_project_nav row">
	<div class="tm_project_nav_left <?php echo esc_attr( $col_left_right ); ?>">
		<?php
		if ( $same_cat != 'false' ) {
			previous_post_link( '<i class="fa fa-angle-left"></i> &nbsp; %link', '%title', true, '', 'project-category' );
		} else {
			previous_post_link( '<i class="fa fa-angle-left"></i> &nbsp; %link' );
		}
		?>
	</div>
	<?php if ( $project_archive_button != 'false' ) { ?>
		<div class="tm_project_nav_center col-md-2">
			<a href="<?php echo tm_get_page_url_by_slug( get_theme_mod( 'project_archive_page_slug', 'all-projects' ) ); ?>">
				<i class="fa fa-th-large"></i>
			</a>
		</div>
	<?php } ?>
	<div class="tm_project_nav_right <?php echo esc_attr( $col_left_right ); ?>">
		<?php
		if ( $same_cat != 'false' ) {
			next_post_link( '%link &nbsp; <i class="fa fa-angle-right"></i>', '%title', true, '', 'project-category' );
		} else {
			next_post_link( '%link &nbsp; <i class="fa fa-angle-right"></i>' );
		}
		?>
	</div>
</div>