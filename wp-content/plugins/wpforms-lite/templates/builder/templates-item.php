<?php
/**
 * Panel Setup (form templates).
 * Form templates list item template.
 *
 * @since 1.6.8
 * @since 1.8.4 Added subcategories attribute.
 * @since 1.8.6 Added fields attribute.
 *
 * @var bool   $selected             Is template selected.
 * @var string $license_class        License class (in the case of higher license needed).
 * @var string $categories           Categories, coma separated.
 * @var string $subcategories        Subcategories, comma separated.
 * @var string $fields               Fields, comma separated.
 * @var string $badge_text           Badge text.
 * @var string $demo_url             Template demo URL.
 * @var string $template_id          Template ID (Slug or ID if available).
 * @var string $education_class      Education class (in the case of higher license needed).
 * @var string $education_attributes Education attributes.
 * @var string $addons_attributes    Required addons attributes.
 * @var array  $template             Template data.
 * @var string $action_text          Template action button text.
 * @var string $badge_class          Badge class in case if there is any badge text exists.
 * @var bool   $can_create           Capability.
 */

use WPForms\Admin\Education\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="wpforms-template<?php echo esc_attr( $license_class ); ?><?php echo esc_attr( $badge_class ); ?>"
	id="wpforms-template-<?php echo sanitize_html_class( $template['slug'] ); ?>">

	<div class="wpforms-template-thumbnail">
		<?php if ( empty( $template['thumbnail'] ) ) { ?>
			<div class="wpforms-template-thumbnail-placeholder">
				<?php if ( $template['slug'] === 'blank' ) { ?>
					<img src="<?php echo esc_url( WPFORMS_PLUGIN_URL . 'assets/images/icon-file.svg' ); ?>" alt="Blank Form Template" loading="lazy" />
				<?php } else { ?>
					<img src="<?php echo esc_url( WPFORMS_PLUGIN_URL . 'assets/images/icon-wpforms.svg' ); ?>" alt="Customizable Form Template" loading="lazy" />
				<?php } ?>
			</div>
		<?php } else { ?>
			<img src="<?php echo esc_url( $template['thumbnail'] ); ?>" alt="<?php echo esc_attr( $template['name'] ); ?> Template" loading="lazy" />
		<?php } ?>
	</div>

	<!-- As requirement for Lists.js library data attribute slug is used in classes list. -->
	<h3 class="wpforms-template-name categories has-access favorite slug subcategories fields" data-categories="<?php echo esc_attr( $categories ); ?>" data-subcategories="<?php echo esc_attr( $subcategories ); ?>"  data-fields="<?php echo esc_attr( $fields ); ?>" data-has-access="<?php echo esc_attr( $template['has_access'] ); ?>" data-favorite="<?php echo esc_attr( $template['favorite'] ); ?>" data-slug="<?php echo esc_attr( $template['slug'] ); ?>">
		<?php echo esc_html( $template['name'] ); ?>
	</h3>

	<span class="wpforms-template-favorite">
		<?php if ( $can_create ) : ?>
			<i class="fa fa-heart <?php echo $template['favorite'] ? '' : 'wpforms-hidden'; ?>" title="<?php esc_attr_e( 'Remove from Favorites', 'wpforms-lite' ); ?>"></i>
			<i class="fa fa-heart-o <?php echo $template['favorite'] ? 'wpforms-hidden' : ''; ?>" title="<?php esc_attr_e( 'Mark as Favorite', 'wpforms-lite' ); ?>"></i>
		<?php endif; ?>
	</span>

	<?php
	if ( ! empty( $badge_text ) && ! $selected ) {
		Helpers::print_badge( $badge_text, 'sm', 'corner', 'steel', 'rounded-bl' );
	}
	?>

	<?php if ( ! empty( $template['description'] ) ) : ?>
		<p class="wpforms-template-desc"><?php echo esc_html( $template['description'] ); ?></p>
	<?php endif; ?>

	<?php if ( $can_create ) : ?>
		<div class="wpforms-template-buttons">
			<a href="#" class="wpforms-template-select wpforms-btn wpforms-btn-md wpforms-btn-orange<?php echo esc_attr( $education_class ); ?>"
				data-template-name-raw="<?php echo esc_attr( $template['name'] ); ?>"
				data-template="<?php echo esc_attr( $template_id ); ?>"
				data-slug="<?php echo esc_attr( $template['slug'] ); ?>"
				<?php echo $education_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php echo $addons_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<?php echo esc_html( $action_text ); ?>
			</a>
			<?php if ( $template['url'] !== '' ) : ?>
				<a class="wpforms-template-demo wpforms-btn wpforms-btn-md wpforms-btn-light-grey"
					href="<?php echo esc_url( $demo_url ); ?>"
					target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'View Demo', 'wpforms-lite' ); ?>
				</a>
			<?php endif; ?>
		</div>
	<?php else : ?>
		<span class="wpforms-template-select" data-template="<?php echo esc_attr( $template_id ); ?>"></span>
	<?php endif; ?>

</div>
