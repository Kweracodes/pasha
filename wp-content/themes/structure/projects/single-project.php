<?php
/**
 * The Template for displaying all single projects.
 *
 * Override this template by copying it to yourtheme/projects/single-project.php
 *
 * @author        WooThemes
 * @package    Projects/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

get_header( 'projects' );
$tm_infinity_default_template = get_post_meta( get_the_ID(), "_default_template", true );
?>
	<div class="content-wrapper">
		<div data-stellar-background-ratio="0.5" class="entry-header has-bg">
			<div class="container">
				<h1 itemprop="name" class="entry-title project_title entry-title"><?php the_title(); ?></h1>
				<?php if ( function_exists( 'tm_bread_crumb' ) && ! is_front_page() ) { ?>
					<div class="breadcrumb">
						<div class="container">
							<?php echo tm_bread_crumb_project(); ?>
						</div>
					</div><!-- .breadcrumb -->
				<?php } ?>
			</div>
		</div>
		<div class="container <?php echo $tm_infinity_default_template == 'yes' ? "project-default-template" : ""; ?>">
			<div class="row">
				<?php
				/**
				 * projects_before_main_content hook
				 *
				 * @hooked projects_output_content_wrapper - 10 (outputs opening divs for the content)
				 */
				do_action( 'projects_before_main_content' );
				?>

				<?php while ( have_posts() ) :
					the_post();
					if ( $tm_infinity_default_template == 'yes' ) {
						?>
						<?php
						$attachment_ids = projects_get_gallery_attachment_ids();
						$lightbox_rel   = apply_filters( 'projects_lightbox_rel', $rel = 'lightbox' );
						if ( $attachment_ids ) { ?>
							<div class="row project-default-template-gallery">
								<div class="col-md-12 gallery">
									<?php
									foreach ( $attachment_ids as $attachment_id ) {
										$classes    = array( 'zoom' );
										$image_link = wp_get_attachment_url( $attachment_id );
										if ( ! $image_link ) {
											continue;
										}
										$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_project_single_thumbnail_size', 'project-single' ) );
										$image_class = esc_attr( implode( ' ', $classes ) );
										$image_title = esc_attr( get_the_title( $attachment_id ) );
										if ( apply_filters( 'projects_gallery_link_images', true ) ) {
											echo '<a href="' . $image_link . '" title="' . $image_title . '" rel="' . $lightbox_rel . ' project-gallery-' . $post->ID . '">' . $image . '</a>';
										} else {
											echo $image;
										}
										$loop ++;
									} // endforeach
									?>
								</div>
							</div>
						<?php } // endif ?>
						<div class="row project-default-template-content">
							<div class="col-md-8 single-project-desc">
								<div class="vc_custom_heading heading-title-3">
									<h2><?php _e( 'Project Description', 'thememove' ); ?></h2>
								</div>
								<?php the_content(); ?>
							</div>
							<div class="col-md-4 single-project-detail">
								<div class="vc_custom_heading heading-title-3">
									<h2><?php _e( 'Project Details', 'thememove' ); ?></h2>
								</div>
								<div class="tm-project-details tm-project-style-1">
									<?php
									global $post;

									// Categories
									$categories = get_the_term_list( $post->ID, 'project-category', '', ', ', '' );

									// Meta
									$client         = esc_attr( get_post_meta( $post->ID, '_client', true ) );
									$location       = esc_attr( get_post_meta( $post->ID, '_location', true ) );
									$surface_area   = esc_attr( get_post_meta( $post->ID, '_surface_area', true ) );
									$year_completed = esc_attr( get_post_meta( $post->ID, '_year_completed', true ) );
									$value          = esc_attr( get_post_meta( $post->ID, '_value', true ) );
									$architect      = esc_attr( get_post_meta( $post->ID, '_architect', true ) );
									$url            = esc_url( get_post_meta( $post->ID, '_url', true ) );
									?>
									<?php if ( $post->post_type != 'project' ) { ?>
										<div class="warning">
											<?php _e( 'Project Details Shortcode only available for "Projects" content type.', 'thememove' ); ?>
										</div>
									<?php } else { ?>
										<div class="tm_project_details">
											<?php if ( $post->post_type != 'project' ) { ?>
												<div class="tm_project_details__warning">
													Project Details Shortcode only available for "Projects" content
													type.
												</div>
											<?php } else { ?>
												<table class="tm_project_details--<?php echo $layout; ?>">
													<?php if ( $categories ) { ?>
														<tr>
															<td class="meta-title">
																<?php echo __( 'Categories', 'thememove' ); ?>
															</td>
															<td>
																<ul class="single-project-categories"><?php echo $categories; ?></ul>
															</td>
														</tr>
													<?php } ?>
													<?php if ( $client ) { ?>
														<tr>
															<td class="meta-title">
																<?php echo __( 'Client', 'thememove' ); ?>
															</td>
															<td class="client__name"><?php echo $client; ?></td>
														</tr>
													<?php } ?>
													<?php if ( $location ) { ?>
														<tr>
															<td class="meta-title">
																<?php echo __( 'Location', 'thememove' ); ?>
															</td>
															<td class="location__name"><?php echo $location; ?></td>
														</tr>
													<?php } ?>
													<?php if ( $surface_area ) { ?>
														<tr>
															<td class="meta-title">
																<?php echo __( 'Surface Area', 'thememove' ); ?>
															</td>
															<td class="surface-area__name"><?php echo $surface_area; ?></td>
														</tr>
													<?php } ?>
													<?php if ( $year_completed ) { ?>
														<tr>
															<td class="meta-title">
																<?php echo __( 'Completed', 'thememove' ); ?>
															</td>
															<td class="year-complete__name"><?php echo $year_completed; ?></td>
														</tr>
													<?php } ?>
													<?php if ( $value ) { ?>
														<tr>
															<td class="meta-title">
																<?php echo __( 'Value', 'thememove' ); ?>
															</td>
															<td class="project-value"><?php echo $value; ?></td>
														</tr>
													<?php } ?>
													<?php if ( $architect ) { ?>
														<tr>
															<td class="meta-title">
																<?php echo __( 'Architect', 'thememove' ); ?>
															</td>
															<td class="architect__name"><?php echo $architect; ?></td>
														</tr>
													<?php } ?>
													<?php if ( $url ) { ?>
														<tr>
															<td class="meta-title">
																<?php echo __( 'Link', 'thememove' ); ?>
															</td>
															<td class="project-url"><a
																	href="<?php echo $url; ?>"><?php echo apply_filters( 'projects_visit_project_link', __( 'Visit project', 'thememove' ) ); ?></a>
															</td>
														</tr>
													<?php } ?>
												</table>
											<?php } ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="row project-default-template-pagination">
							<div class="col-md-5 left">
								<?php
								previous_post_link( '<i class="fa fa-angle-left"></i> &nbsp; %link' );
								?>
							</div>
							<div class="col-md-2 center">
								<a href="<?php echo tm_get_page_url_by_slug( get_theme_mod( 'project_archive_page_slug', 'all-projects' ) ); ?>">
									<i class="fa fa-th-large"></i>
								</a>
							</div>
							<div class="col-md-5 right">
								<?php
								next_post_link( '%link &nbsp; <i class="fa fa-angle-right"></i>' );
								?>
							</div>
						</div>
						<?php
					} else {
						the_content();
					}
				endwhile; // end of the loop. ?>

				<?php
				/**
				 * projects_after_main_content hook
				 *
				 * @hooked projects_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'projects_after_main_content' );
				?>

			</div>
		</div>
	</div>
<?php get_footer( 'projects' );