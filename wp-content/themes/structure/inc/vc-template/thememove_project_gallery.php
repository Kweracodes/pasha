<?php
extract( shortcode_atts( array(
	'number'     => '1',
	'pagination' => '1'
), $atts ) );
?>

<?php
$attachment_ids = projects_get_gallery_attachment_ids();
$lightbox_rel   = apply_filters( 'projects_lightbox_rel', $rel = 'lightbox' );
if ( $attachment_ids ) { ?>
	<div class="tm_project_gallery">
		<?php
		foreach ( $attachment_ids as $attachment_id ) {
			$classes    = array( 'zoom' );
			$image_link = wp_get_attachment_url( $attachment_id );
			if ( ! $image_link ) {
				continue;
			}
			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_project_single_thumbnail_size', 'project-single' ) );
			$image_thumb = wp_get_attachment_image( $attachment_id, 'medium' );
			$image_class = esc_attr( implode( ' ', $classes ) );
			$image_title = esc_attr( get_the_title( $attachment_id ) );
			if ( apply_filters( 'projects_gallery_link_images', true ) ) {
				echo '<a data-fancybox="gallery" href="' . $image_link . '" title="' . $image_title . '" rel="' . $lightbox_rel . ' project-gallery-' . $post->ID . '">' . $image_thumb . '</a>';
			} else {
				echo $image;
			}
			$loop ++;
		} // endforeach
		?>
	</div>
<?php } ?>
<script>
	jQuery(document).ready(function ($) {
		$(".tm_project_gallery").owlCarousel(
			{
				items: <?php echo esc_js( $number ); ?>,
				navigation: false,
				margin: 30,
				<?php if($pagination == '1') { ?>
				dots: true,
				<?php } else { ?>
				dots: false,
				<?php } ?>
				loop: true,
				autoplay: true,
				autoplayHoverPause: true
			}
		);
	});
</script>
