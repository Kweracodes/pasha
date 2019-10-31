<?php
/**
 * Loop Rating
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}
?>

<?php if ( $rating_html = $product->get_rating_html() ) : ?>
	<div class="item-rating">
		<?php echo $rating_html; ?>
	</div>
<?php endif; ?>
