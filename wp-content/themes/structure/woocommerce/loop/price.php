<?php
/**
 * Loop Price
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<h4 class="price"><?php echo $price_html; ?></h4>
<?php endif; ?>
