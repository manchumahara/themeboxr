<?php

	/**
	 *
	 * @link              https://codeboxr.com
	 * @since             1.0.0
	 * @package           cbxthemeinfo
	 *
	 * @wordpress-plugin
	 * Plugin Name:       CBX Theme Custom Information
	 * Plugin URI:        https://themeboxr.com
	 * Description:       This plugin stores theme's custom information
	 * Version:           1.0.1
	 * Author:            Themeboxr Team
	 * Author URI:        https://themeboxr.com
	 * License:           GPL-2.0+
	 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
	 * Text Domain:       cbxthemeinfo
	 * Domain Path:       /languages
	 */

	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}


	defined( 'CBXTHEMEINFO_PLUGIN_NAME' ) or define( 'CBXTHEMEINFO_PLUGIN_NAME', 'cbxthemeinfo' );
	defined( 'CBXTHEMEINFO_PLUGIN_VERSION' ) or define( 'CBXTHEMEINFO_PLUGIN_VERSION', '1.0.0' );
	defined( 'CBXTHEMEINFO_BASE_NAME' ) or define( 'CBXTHEMEINFO_BASE_NAME', plugin_basename( __FILE__ ) );
	defined( 'CBXTHEMEINFO_ROOT_PATH' ) or define( 'CBXTHEMEINFO_ROOT_PATH', plugin_dir_path( __FILE__ ) );
	defined( 'CBXTHEMEINFO_ROOT_URL' ) or define( 'CBXTHEMEINFO_ROOT_URL', plugin_dir_url( __FILE__ ) );

	class  CBXThemeinfo {
		/**
		 * Constructor
		 */
		public function __construct() {
			//load text domain
			load_plugin_textdomain( 'cbxthemeinfo', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

			$this->load_dependencies();

			add_action( "add_meta_boxes", array( $this, 'init_product_metabox' ) );
			add_action( 'save_post', array( $this, 'save_product_metabox' ), 10, 2 );

			//product related shortcode
			add_shortcode( 'cbxdemourl', array( $this, 'shortcode_cbxdemourl' ) );
			add_shortcode( 'cbxdocurl', array( $this, 'shortcode_cbxdocurl' ) );
			add_shortcode( 'cbxlicence', array( $this, 'shortcode_cbxlicence' ) );
			add_shortcode( 'cbxversion', array( $this, 'shortcode_cbxversion' ) );
		}//end of constructor

		/**
		 * Load dependency files
		 */
		public function load_dependencies() {
			require_once plugin_dir_path( __FILE__ ) . 'includes/class-cbxthemeinfo-helper.php';
		}//end method load_dependencies

		/**
		 * Create metabox for
		 */
		public function init_product_metabox() {
			add_meta_box( 'cbxthemeinfo', esc_html__( 'Product Information', 'cbxthemeinfo' ), array(
				$this,
				'display_product_metabox'
			), 'product', 'normal', 'high' );
		}

		/**
		 * Display custom meta field for product post type
		 */
		public function display_product_metabox() {
			global $post;

			$fieldValues = get_post_meta( $post->ID, '_cbxthemeinfo', true );

			wp_nonce_field( 'cbxthemeinfo', 'cbxthemeinfo[nonce]' );


			$cmstype     = isset( $fieldValues['cmstype'] ) ? esc_attr( $fieldValues['cmstype'] ) : 'other'; //cmstype
			$demourl     = isset( $fieldValues['demourl'] ) ? esc_attr( $fieldValues['demourl'] ) : ''; //demo url
			$docurl      = isset( $fieldValues['docurl'] ) ? esc_attr( $fieldValues['docurl'] ) : ''; //doc url
			$version     = isset( $fieldValues['version'] ) ? esc_attr( $fieldValues['version'] ) : ''; //version
			$related     = isset( $fieldValues['related'] ) ? esc_attr( $fieldValues['related'] ) : ''; //version
			$price       = isset( $fieldValues['price'] ) ? intval( $fieldValues['price'] ) : ''; //price
			$last_update = isset( $fieldValues['lastupdate'] ) ? esc_attr( $fieldValues['lastupdate'] ) : ''; //lastupdate
			$sub_title   = isset( $fieldValues['subtitle'] ) ? esc_attr( $fieldValues['subtitle'] ) : ''; //subtitle


			//$template = isset( $fieldValues['template'] ) ? intval( $fieldValues['template'] ) : 0; //use special template


			?>
			<table class="widefat">
				<tbody>
				<tr valign="top">
					<td><?php esc_html_e( 'Sub Title', 'cbxthemeinfo' ); ?>
					</td>
					<td>
						<input class="regular-text" type="text" name="cbxthemeinfo[subtitle]"
							   value="<?php echo $sub_title; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td><?php esc_html_e( 'Demo Url', 'cbxthemeinfo' ); ?></td>
					<td>
						<input class="regular-text" type="text" name="cbxthemeinfo[demourl]"
							   value="<?php echo $demourl; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td><?php esc_html_e( 'Documentation Url', 'cbxthemeinfo' ); ?></td>
					<td>
						<input class="regular-text" type="text" name="cbxthemeinfo[docurl]"
							   value="<?php echo $docurl; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td><?php esc_html_e( 'Version', 'cbxthemeinfo' ); ?></td>
					<td>
						<input class="regular-text" type="text" name="cbxthemeinfo[version]"
							   value="<?php echo $version; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td><?php esc_html_e( 'Price', 'cbxthemeinfo' ); ?></td>
					<td>
						<input class="regular-text" type="text" name="cbxthemeinfo[price]"
							   value="<?php echo $price; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td><?php esc_html_e( 'Last Update', 'cbxthemeinfo' ); ?>
					</td>
					<td>
						<input class="regular-text" type="text" name="cbxthemeinfo[lastupdate]"
							   value="<?php echo $last_update; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td><?php esc_html_e( 'Type', 'cbxthemeinfo' ); ?></td>
					<td>
						<fieldset>
							<label title='g:i a'> <input type="radio" <?php checked( $cmstype, 'html', true ) ?>
														 name="cbxthemeinfo[cmstype]" value="html" />
								<span><?php esc_html_e( 'Html', 'cbxthemeinfo' ); ?></span> </label><br>
							<label title='g:i a'> <input type="radio" <?php checked( $cmstype, 'joomla', true ) ?>
														 name="cbxthemeinfo[cmstype]" value="joomla" />
								<span><?php esc_html_e( 'Joomla', 'cbxthemeinfo' ); ?></span> </label><br>
							<label title='g:i a'> <input
									type="radio" <?php checked( $cmstype, 'wordpress', true ) ?>
									name="cbxthemeinfo[cmstype]" value="wordpress" /> <span>Wordpress</span>
							</label><br> <label title='g:i a'> <input
									type="radio" <?php checked( $cmstype, 'theme', true ) ?>
									name="cbxthemeinfo[cmstype]" value="theme" /> <span>Theme</span> </label><br>
							<label title='g:i a'> <input type="radio" <?php checked( $cmstype, 'psd', true ) ?>
														 name="cbxthemeinfo[cmstype]" value="psd" />
								<span><?php esc_html_e( 'PSD', 'cbxthemeinfo' ); ?></span> </label><br>
							<label title='g:i a'> <input type="radio" <?php checked( $cmstype, 'creative', true ) ?>
														 name="cbxthemeinfo[cmstype]" value="creative" />
								<span><?php esc_html_e( 'Creative', 'cbxthemeinfo' ); ?></span> </label><br>
							<label title='g:i a'> <input type="radio" <?php checked( $cmstype, 'other', true ) ?>
														 name="cbxthemeinfo[cmstype]" value="other" />
								<span>Others</span> </label><br>
						</fieldset>

					</td>
				</tr>
				<!-- <tr valign="top">
                    <td>Special Template</td>
                    <td>
                        <fieldset>

                            <label title='g:i a'> <input type="radio" <?php /*checked( $template, 1, true ) */ ?>
                                                         name="cbxthemeinfo[template]" value="1" /> <span>Yes</span>
                            </label><br> <label title='g:i a'> <input
                                        type="radio" <?php /*checked( $template, 0, true ) */ ?>
                                        name="cbxthemeinfo[template]" value="0" /> <span>No</span> </label><br>
                        </fieldset>

                    </td>
                </tr>-->
				<tr valign="top">
					<td><?php esc_html_e( 'Related Product ID(S)', 'cbxthemeinfo' ); ?></td>
					<td>
						<input class="regular-text" type="text" name="cbxthemeinfo[related]"
							   value="<?php echo $related; ?>" />
					</td>
				</tr>


				</tbody>
			</table>
			<?php
		}//end method display_product_metabox

		/**
		 * save product metabox
		 *
		 * @param $post_id
		 * @param $post
		 */
		function save_product_metabox( $post_id, $post ) {
			$post_type = 'product';

			// If this isn't a 'book' post, don't update it.
			if ( $post_type != $post->post_type ) {
				return;
			}


			if ( isset( $_POST['cbxthemeinfo'] ) ) {

				$postData = $_POST['cbxthemeinfo'];


				$saveableData = array();


				//if(!empty($postData['bdnewsphotobox'])) {
				if ( $this->user_can_save( $post_id, 'cbxthemeinfo', $postData['nonce'] ) ) {


					$saveableData['marketurl']  = sanitize_text_field( $postData['marketurl'] );
					$saveableData['demourl']    = sanitize_text_field( $postData['demourl'] );
					$saveableData['docurl']     = sanitize_text_field( $postData['docurl'] );
					$saveableData['version']    = sanitize_text_field( $postData['version'] );
					$saveableData['related']    = sanitize_text_field( $postData['related'] );
					$saveableData['price']      = sanitize_text_field( $postData['price'] );
					$saveableData['lastupdate'] = sanitize_text_field( $postData['lastupdate'] );
					$saveableData['subtitle']   = sanitize_text_field( $postData['subtitle'] );
					$saveableData['cmstype']    = esc_attr( $postData['cmstype'] );
					//$saveableData['template']  = intval( $postData['template'] );

					update_post_meta( $post_id, '_cbxthemeinfo', $saveableData );
				}
			}
		}//end method save_product_metabox

		public function shortcode_cbxlicence( $atts ) {
			return '<span class="btn btn-cbx btn-licence">GPLv2 or later</span>';
		}//end method shortcode_cbxlicence


		/**
		 * Shortcode Function for Doc Url
		 *
		 * @param type $atts
		 *
		 * @return type string | null
		 */
		public function shortcode_cbxdocurl( $atts ) {
			global $post;
			if ( $post->post_type != 'product' ) {
				return '';
			} else {

				extract( shortcode_atts( array(
					'url'   => '',
					'title' => 'Documentation url',
					'text'  => 'Documentation'
				), $atts ) );


				$fieldValues = get_post_meta( $post->ID, '_cbxthemeinfo', true );
				$docurl      = isset( $fieldValues['docurl'] ) ? esc_attr( $fieldValues['docurl'] ) : ''; //docurl

				if ( $url != '' ) {
					$docurl = $url;
				}

				return '<a href="' . $docurl . '" title="' . $title . '" class="btn btn-cbx btn-doc" target="_blank"><i class="fa fa-life-ring"></i> ' . $text . '</a>';

			}
		}//end shortcode_cbxdocurl

		/**
		 * Shortcode Function for Demo Url
		 *
		 * @param type $atts
		 *
		 * @return type string | null
		 */
		public function shortcode_cbxdemourl( $atts ) {
			global $post;
			if ( $post->post_type != 'product' ) {
				return '';
			} else {

				extract( shortcode_atts( array(
					'url'   => '',
					'title' => 'Demo url',
					'text'  => 'Demo'
				), $atts ) );


				$fieldValues = get_post_meta( $post->ID, '_cbxthemeinfo', true );
				$demourl     = isset( $fieldValues['demourl'] ) ? esc_attr( $fieldValues['demourl'] ) : ''; //demourl
				$demourl     = ( $url != '' ) ? $url : $demourl;


				if ( $demourl == '' ) {
					return '';
				}

				return '<a href="' . $demourl . '" title="' . $title . '" class="btn btn-cbx btn-demo" target="_blank"><i class="fa fa-bolt"></i> ' . $text . '</a>';

			}
		}//end shortcode_cbxdemourl

		public function shortcode_cbxversion( $atts ) {
			global $post;
			if ( $post->post_type != 'product' ) {
				return '';
			} else {

				$fieldValues = get_post_meta( $post->ID, '_cbxthemeinfo', true );

				$version = isset( $fieldValues['version'] ) ? esc_attr( $fieldValues['version'] ) : ''; //version

				if ( $version == '' ) {
					return '';
				} else {
					return '<span class="btn btn-cbx btn-version">Version ' . $version . '</span>';
				}
			}
		}//end shortcode_cbxversion

		/**
		 * Save Meta
		 *
		 * @param $post_id
		 * @param $action
		 * @param $nonce
		 *
		 * @return bool
		 */
		function user_can_save( $post_id, $action, $nonce ) {

			$is_autosave    = wp_is_post_autosave( $post_id );
			$is_revision    = wp_is_post_revision( $post_id );
			$is_valid_nonce = ( isset( $nonce ) && wp_verify_nonce( $nonce, $action ) );

			// Return true if the user is able to save; otherwise, false.
			return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
		}//end method user_can_save
	}//end method CBXThemeinfo

	//initialize the plugin
	new CBXThemeinfo();