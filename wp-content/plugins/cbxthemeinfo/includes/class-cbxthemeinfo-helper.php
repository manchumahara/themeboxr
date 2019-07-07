<?php
	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	/**
	 * Helper class
	 *
	 * Class CBXThemeinfoHelper
	 */
	class CBXThemeinfoHelper {

		/**
		 * Human readable theme info
		 *
		 * @param $cms_type
		 *
		 * @return string
		 */
		public static function getCmsType($cms_type){

			$cms_type_text = esc_html__('Miscellaneous', 'cbxthemeinfo');

			switch ($cms_type) {
				case 'joomla':
					$cms_type_text = esc_html__('Joomla', 'cbxthemeinfo');
					break;
				case 'wordpress':
					$cms_type_text = esc_html__('WordPress', 'cbxthemeinfo');
					break;
				case 'html':
					$cms_type_text = esc_html__('Html', 'cbxthemeinfo');
					break;
				case 'creative':
					$cms_type_text = esc_html__('Creative', 'cbxthemeinfo');
					break;
			}

			return $cms_type_text;
		}//end method getCmsType

	}//end class CBXThemeinfoHelper