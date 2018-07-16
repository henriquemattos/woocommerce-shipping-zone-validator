<?php
/**
 * Validate Shipping Zone
 * Verify if the customer postcode (ZIP) is valid and in a shipping zone.
 *
 * @package WooCommerce_Shipping_Zone_Validator/Templates
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="wc-shipping-zone-validator">
	<?php if ($showNotice) : ?>
		<?php if ($isValidPostcode) : ?>
			<div class="wc-shipping-zone-validator-notice success">
				<p class="wc-shipping-zone-validator-text success">
					<?php echo __('Postcode/ZIP is available in the shipping zones', 'wc-shipping-zone-validator'); ?>
				</p>
			</div>
		<?php else : ?>
			<div class="wc-shipping-zone-validator-notice error">
				<p class="wc-shipping-zone-validator-text error">
					<?php echo __('Postcode/ZIP not available in the shipping zones', 'wc-shipping-zone-validator'); ?>
				</p>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<form method="post">
		<div style="display: none; visibility: hidden;">
			<input type="hidden" id="wc-shipping-zone-validator-check" name="action" value="validate-shipping-zone" />
		</div>
		<div class="wc-shipping-zone-validator-label">
			<label for="postcode"><?php echo __('Postcode / ZIP', 'woocommerce'); ?></label>
		</div>
		<div class="wc-shipping-zone-validator-input">
			<input type="text" name="postcode" value="" placeholder="<?php echo __('Please enter a valid postcode / ZIP.', 'woocommerce'); ?>" />
		</div>
		<div class="wc-shipping-zone-validator-button">
			<button type="submit" name="validate-shipping-zone"><?php echo __('Submit', 'woocommerce'); ?></button>
		</div>
	</form>
</section>