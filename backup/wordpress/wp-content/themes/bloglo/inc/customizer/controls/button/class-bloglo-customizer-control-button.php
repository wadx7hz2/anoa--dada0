<?php
/**
 * Bloglo Customizer custom background control class.
 *
 * @package     Bloglo
 * @author      Peregrine Themes
 * @since       1.0.0
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Bloglo_Customizer_Control_Button' ) ) :
	/**
	 * Bloglo Customizer custom background control class.
	 */
	class Bloglo_Customizer_Control_Button extends Bloglo_Customizer_Control {

		/**
		 * The control type.
		 *
		 * @var string
		 */
		public $type = 'bloglo-button';

		/**
		 * Ajax Action.
		 *
		 * @var string
		 */
		public $ajax_action = '';

		/**
		 * Button text.
		 *
		 * @var string
		 */
		public $button_text = '';

		/**
		 * Button url.
		 *
		 * @var string
		 */
		public $button_url = '#';

		/**
		 * Link target.
		 *
		 * @since 1.0.0
		 * @var   string
		 */
		public $target = '_blank';

		/**
		 * Set the default typography options.
		 *
		 * @since 1.0.0
		 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
		 * @param string               $id      Control ID.
		 * @param array                $args    Default parent's arguments.
		 */
		public function __construct( $manager, $id, $args = array() ) {

			parent::__construct( $manager, $id, $args );

			if ( $this->ajax_action ) {
				$this->button_url = '#';
			}
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['button_text'] = $this->button_text;
			$this->json['button_url']  = $this->button_url;
			$this->json['target']      = $this->target;
			$this->json['ajax_action'] = $this->ajax_action;
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @see WP_Customize_Control::print_template()
		 */
		protected function content_template() {
			?>
			<div class="bloglo-button-wrapper bloglo-control-wrapper">

				<# if ( data.label ) { #>
					<span class="bloglo-control-heading customize-control-title bloglo-field">{{{ data.label }}}</span>
				<# } #>

				<# if ( data.ajax_action ) { #>
					<span class="spinner"></span>
				<# } #>

				<a href="{{ data.button_url }}" class="button button-secondary" rel="noopener noreferrer" target="{{ data.target }}"<# if ( data.ajax_action ) { #> data-ajax-action="{{ data.ajax_action }}"<# } #>>{{{ data.button_text }}}</a>

			</div><!-- END .bloglo-button-wrapper -->

			<# if ( data.description ) { #>
				<div class="description customize-control-description bloglo-field">{{{ data.description }}}</div>
			<# } #>

			<?php
		}

	}
endif;
