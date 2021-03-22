<?php

	class  CBXTestimonial {


		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( "admin_init", array( $this, 'create_metabox' ) );
			add_action( 'save_post', array( $this, 'save_metabox' ), 10, 2 );

			add_action( 'wp_ajax_cbrelatedpostajax', array( $this, 'cbrelatedpostajax_callback' ) );

			//col header, values and sortable
			add_filter( 'manage_testimonial_posts_columns', array($this, 'testimonial_columns_header') ); // show or remove extra column
			add_action( 'manage_testimonial_posts_custom_column',  array($this, 'testimonial_custom_column_row'), 10, 2 ); // modify column's row data to display
			add_filter( 'manage_edit-testimonial_sortable_columns',  array($this,'testimonial_custom_column_sortable') );
			add_filter( 'post_row_actions',  array($this, 'testimonial_row_actions_petition_listing'), 10, 2 );

			add_filter( 'parse_query', array($this, 'testimonial_custom_column_sort') );
			add_filter( 'pre_get_posts', array($this, 'testimonial_archive') );
		}

		public function testimonial_archive($query){
				if(is_post_type_archive('testimonial') && $query->is_main_query()){
					$product_id = isset($_REQUEST['product_id'])?  absint($_REQUEST['product_id']) : '';
					if($product_id > 0){
						$meta_query = array(
							array(
								'key' => '_cbxtestimonial_product',
								'value' => $product_id,
								//'type' => 'DATE',
								'compare' => '='
							)
						);

						$query->set('meta_query', $meta_query);
					}
				}
		}

		/**
		 * Testimonial sort by meta key
		 *
		 * @param $query
		 *
		 * @return mixed
		 */
		public function testimonial_custom_column_sort($query) {

			if ( ! is_admin() )
				return $query;

			global $current_screen;
			if ( isset( $current_screen ) && 'testimonial' === $current_screen->post_type ) {
				if(isset($_REQUEST['orderby']) && $_REQUEST['orderby'] == 'cbxtestimonial_product' ){
					$query->query_vars['orderby']  = 'meta_value';
					$query->query_vars['meta_key'] = '_cbxtestimonial_product';
					$query->query_vars['order']    = 'DSC';
				}

				if(isset($_REQUEST['orderby']) && $_REQUEST['orderby'] == 'cbxtestimonial_featured' ){
					$query->query_vars['orderby']  = 'meta_value';
					$query->query_vars['meta_key'] = '_cbxtestimonial_featured';
					$query->query_vars['order']    = 'DSC';
				}

				if(isset($_REQUEST['product_id']) && absint($_REQUEST['product_id']) > 0){
					$product_id = absint($_REQUEST['product_id']);
					$meta_query = array(
						array(
							'key' => '_cbxtestimonial_product',
							'value' => $product_id,
							//'type' => 'DATE',
							'compare' => '='
						)
					);

					$query->query_vars['meta_query'] =  $meta_query;
				}


			}
		}

		/**
		 * Listing Custom Col header for testimonial
		 *
		 * @param $columns
		 *
		 * @return mixed
		 */
		public function testimonial_columns_header( $columns ) {
			//unset native date col
			unset( $columns['date'] );
			unset( $columns['author'] );

			//add cols
			$columns['cbxtestimonial_product']          = esc_html__( 'Product', 'cbxpetition' );
			$columns['cbxtestimonial_featured']          = esc_html__( 'Featured', 'cbxpetition' );

			return $columns;
		}//end testimonial_columns_header


		/**
		 * Show value for testimonial custom cols
		 *
		 * @param $column
		 * @param $post_id
		 */
		public function testimonial_custom_column_row( $column, $post_id ) {
			//$fieldValues = get_post_meta( $post_id, '_cbxtestimonial', true );

			switch ( $column ) {
				case 'cbxtestimonial_product':

					$product = intval(get_post_meta( $post_id, '_cbxtestimonial_product', true ));
					echo ($product > 0)? '<a target="_blank" href="'.get_the_permalink($product).'">'.$product.'</a>' : '';

					break;
				case 'cbxtestimonial_featured':
					$featured = intval(get_post_meta( $post_id, '_cbxtestimonial_featured', true ));
					echo ($featured > 0)? 'Featured' : '';
					break;
			}
		}//end testimonial_custom_column_row

		/**
		 * Making custom testimonial cols sortable
		 *
		 * @param $columns
		 *
		 * @return mixed
		 */
		public function testimonial_custom_column_sortable( $columns ) {
			$columns['cbxtestimonial_product'] 	= 'cbxtestimonial_product';
			$columns['cbxtestimonial_featured'] = 'cbxtestimonial_featured';

			return $columns;
		}//end testimonial_custom_column_sortable


		/**
		 * Add extra links to row meta for testimonial
		 *
		 * @param $actions
		 * @param $page_object
		 *
		 * @return mixed
		 */
		public function testimonial_row_actions_petition_listing( $actions, $post ) {
			if ( $post->post_type === 'testimonial' ) {
				$post_id                      = intval( $post->ID );
				$product_id = intval(get_post_meta( $post_id, '_cbxtestimonial_product', true ));
				if($product_id > 0){

					$testimonial_archive_link = get_post_type_archive_link('testimonial');
					$testimonial_archive_link = add_query_arg('product_id', $product_id , $testimonial_archive_link);

					$actions['all_reviews_public'] = '<a target="_blank" href="' . $testimonial_archive_link . '">' . esc_html__( 'All Reviews','themeboxr' ) . '</a>';
					$actions['all_reviews_admin'] = '<a href="' . admin_url( 'edit.php?post_type=testimonial&product_id=' . intval( $product_id ) ) . '">' . esc_html__( 'All Reviews(admin)','themeboxr' ) . '</a>';
					$actions['testimonial_edit_product'] = '<a target="_blank" href="' . get_edit_post_link($product_id) . '">' . esc_html__( 'Edit Product','themeboxr' ) . '</a>';
				}
			}

			return $actions;

		}//end testimonial_row_actions_petition_listing

		/**
		 * Setup a post object and store the original loop item so we can reset it later
		 *
		 * @param obj $post_to_setup The post that we want to use from our custom loop
		 */
		function setup_admin_postdata( $post_to_setup ) {
			//only on the admin side
			if ( is_admin() ) {

				//get the post for both setup_postdata() and to be cached
				global $post;

				//only cache $post the first time through the loop
				if ( ! isset( $GLOBALS['post_cache'] ) ) {
					$GLOBALS['post_cache'] = $post;
				}

				//setup the post data as usual
				$post = $post_to_setup;
				setup_postdata( $post );
			}
		}//end setup_admin_postdata


		/**
		 * Reset $post back to the original item
		 *
		 */
		function wp_reset_admin_postdata() {
			//only on the admin and if post_cache is set
			if ( is_admin() && ! empty( $GLOBALS['post_cache'] ) ) {

				//globalize post as usual
				global $post;

				//set $post back to the cached version and set it up
				$post = $GLOBALS['post_cache'];
				setup_postdata( $post );

				//cleanup
				unset( $GLOBALS['post_cache'] );
			}
		}//end wp_reset_admin_postdata

		/**
		 * Create metabox for
		 */
		public function create_metabox() {
			add_meta_box( 'cbxtestimonial', 'Testimonial Information', array(
				$this,
				'display_metabox'
			), 'testimonial', 'normal', 'high' );
		}//end create_metabox

		/**
		 * Display custom meta field for product post type
		 */
		public function display_metabox() {
			global $post;

			$fieldValues = get_post_meta( $post->ID, '_cbxtestimonial', true );


			wp_nonce_field( 'cbxtestimonial', 'cbxtestimonial[nonce]' );

			$name        = isset( $fieldValues['name'] ) ? esc_attr( $fieldValues['name'] ) : ''; //customer name
			$designation = isset( $fieldValues['designation'] ) ? esc_attr( $fieldValues['designation'] ) : ''; //custom designation

			$photo    = isset( $fieldValues['photo'] ) ? esc_attr( $fieldValues['photo'] ) : ''; //custom photo
			$referene = isset( $fieldValues['referene'] ) ? esc_attr( $fieldValues['referene'] ) : ''; //where the testimonial was given

			//for customer and service type testimonial
			$website   = isset( $fieldValues['website'] ) ? esc_attr( $fieldValues['website'] ) : ''; //customer website
			$brandname = isset( $fieldValues['brandname'] ) ? esc_attr( $fieldValues['brandname'] ) : ''; //brand name


			$featured = intval( get_post_meta( $post->ID, '_cbxtestimonial_featured', true ) );
			$product  = intval( get_post_meta( $post->ID, '_cbxtestimonial_product', true ) );

			if ( isset( $fieldValues['featured'] ) ) {
				$featured = isset( $fieldValues['featured'] ) ? intval( $fieldValues['featured'] ) : 0;
			}


			if ( isset( $fieldValues['product'] ) ) {
				$product = isset( $fieldValues['product'] ) ? intval( $fieldValues['product'] ) : 0;

			}


			$postlink = '';
			if ( intval( $product ) > 0 ) {
				$posteditlink = get_edit_post_link( $product );
				$postlink     = '<br/>Current Product: <a href="' . get_permalink( $product ) . '">' . get_the_title( $product ) . '</a> | <a href="' . $posteditlink . '">Edit</a>';
			}

			?>
			<table class="widefat">

				<tbody>
				<tr valign="top">
					<td>Featured</td>
					<td>
						<fieldset>

							<label title='g:i a'> <input type="radio" <?php checked( $featured, 1, true ) ?>
														 name="cbxtestimonial[featured]" value="1" /> <span>Yes</span>
							</label><br> <label title='g:i a'> <input
									type="radio" <?php checked( $featured, 0, true ) ?>
									name="cbxtestimonial[featured]" value="0" /> <span>No</span> </label><br>

						</fieldset>

					</td>
				</tr>
				<tr valign="top">
					<td>Custom Name</td>
					<td>
						<input class="regular-text" type="text" name="cbxtestimonial[name]"
							   value="<?php echo $name; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td>Referene</td>
					<td>
						<input class="regular-text" type="text" name="cbxtestimonial[referene]"
							   value="<?php echo $referene; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td>Custom Designation</td>
					<td>
						<input class="regular-text" type="text" name="cbxtestimonial[designation]"
							   value="<?php echo $designation; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td>Custom Photo Url</td>
					<td>
						<input class="regular-text" type="text" name="cbxtestimonial[photo]"
							   value="<?php echo $photo; ?>" />
					</td>
				</tr>

				<tr valign="top">
					<td>Brand Website</td>
					<td>
						<input class="regular-text" type="text" name="cbxtestimonial[website]"
							   value="<?php echo $website; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td>Brandname</td>
					<td>
						<input class="regular-text" type="text" name="cbxtestimonial[brandname]"
							   value="<?php echo $brandname; ?>" />
					</td>
				</tr>
				<tr valign="top">
					<td>Product</td>
					<td>
						<input class="regular-text" type="text" name="cbxtestimonial[product]"
							   value="<?php echo $product; ?>" />
						<p><?php echo $postlink; ?></p>
					</td>
				</tr>
				</tbody>
			</table>
			<div id="cbrelatedpostsearchwrapper">
				<div class="cbrplink-search-wrapper">
					<label> <span><?php _e( 'Search' ); ?></span> <input type="text" id="cbrpsearchfield"
																		 class="cbrplink-search-field" tabindex="60"
																		 autocomplete="off" /> <input type="button"
																									  id="cbrpsearchfieldbt"
																									  value="Find"
																									  class="button" />
					</label>
				</div>
				<div class="cbrplink-searchresult-wrapper">
					<ul id="cbrelatedpostsresult">

					</ul>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(document).ready(function ($) {
					$("#cbrpsearchfieldbt").on('click', function (e) {
						$("#cbrpsearchfield").keypress();
					});

					$("#cbrpsearchfield").on('keypress', function (e) {
						var cbrpsearchterm = $("#cbrpsearchfield").val();
						if (cbrpsearchterm.length > 5) {
							var data = {
								action      : 'cbrelatedpostajax',
								rpsearchterm: cbrpsearchterm,
								postid      :<?php echo $post->ID; ?>
							};
							$.post(ajaxurl, data, function (response) {
								$('#cbrelatedpostsresult').html(response);
							});
						}
					});

				});
			</script>

			<?php
		}//end display_metabox

		/**
		 * save product metabox
		 *
		 * @param $post_id
		 * @param $post
		 */
		function save_metabox( $post_id, $post ) {
			$post_type = 'testimonial';

			// If this isn't a 'book' post, don't update it.
			if ( $post_type != $post->post_type ) {
				return;
			}


			if ( ! empty( $_POST['cbxtestimonial'] ) ) {

				$postData = $_POST['cbxtestimonial'];


				$saveableData = array();

				if ( $this->user_can_save( $post_id, 'cbxtestimonial', $postData['nonce'] ) ) {
					$saveableData['name']        = sanitize_text_field( $postData['name'] );
					$saveableData['designation'] = sanitize_text_field( $postData['designation'] );

					$saveableData['photo']    = sanitize_text_field( $postData['photo'] );
					$saveableData['referene'] = sanitize_text_field( $postData['referene'] );

					$saveableData['website']   = sanitize_text_field( $postData['website'] );
					$saveableData['brandname'] = sanitize_text_field( $postData['brandname'] );

					//$saveableData['featured'] = sanitize_text_field( $postData['featured'] );
					//$saveableData['product']  = esc_attr( $postData['product'] );

					$featured = sanitize_text_field( $postData['featured'] );
					$product  = intval( ( $postData['product'] ) );

					update_post_meta( $post_id, '_cbxtestimonial', $saveableData );
					update_post_meta( $post_id, '_cbxtestimonial_featured', $featured );
					if ( $product > 0 ) {
						update_post_meta( $post_id, '_cbxtestimonial_product', $product );
					} else {
						delete_post_meta( $post_id, '_cbxtestimonial_product' );
					}


				}
			}
		}//end save_metabox

		/**
		 * Determines whether or not the current user has the ability to save meta data associated with this post.
		 *
		 * @param        int $post_id            The ID of the post being save
		 * @param            bool                Whether or not the user has the ability to save this post.
		 */
		function user_can_save( $post_id, $action, $nonce ) {

			$is_autosave    = wp_is_post_autosave( $post_id );
			$is_revision    = wp_is_post_revision( $post_id );
			$is_valid_nonce = ( isset( $nonce ) && wp_verify_nonce( $nonce, $action ) );

			// Return true if the user is able to save; otherwise, false.
			return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
		}//end user_can_save

		function cbrelatedpostajax_callback() {
			ob_clean();

			$rpsearchterm = sanitize_text_field( $_POST['rpsearchterm'] );
			//$postid       = intval( $_POST['postid'] );
			$args = array(
				'post_type'      => 'product',
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'posts_per_page' => 20,
				's'              => esc_attr( $rpsearchterm )
			);

			$posts_array = get_posts( $args );


			if ( sizeof( $posts_array ) > 0 ) {
				foreach ( $posts_array as $post ) : $this->setup_admin_postdata( $post );
					$id = get_the_ID();


					echo '<li>' . get_the_title( $id ) . ' - ' . $id . '</li>';

				endforeach;
				$this->wp_reset_admin_postdata();
			} else {
				echo '<li>' . esc_html__( 'No search result found', 'themeboxr' ) . '</li>';
			}

			die();
		}//end cbrelatedpostajax_callback
	}//end class CBXTestimonial