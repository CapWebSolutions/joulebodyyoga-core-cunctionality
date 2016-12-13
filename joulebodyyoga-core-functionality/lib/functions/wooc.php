<?php
/**
 * WooC
 *
 * This file contains functions realted to WooCommerce customizations
 *
 * @package   Core_Functionality
 * @since        1.0.0
 * @Plugin URI: https://github.com/mattry/selflove-core-cunctionality
 * @author			Matt Ryan [Cap Web Solutions] <matt@mattryan.co>
 * @copyright  Copyright (c) 2016, Cap Web Solutions
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


/**
 * @snippet       Remove Product Tabs & Echo Long Description
 * @how-to        Watch tutorial @ http://businessbloomer.com/?p=19055
 * @sourcecode    http://businessbloomer.com/?p=19940
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.5.2
 */

add_action( 'woocommerce_after_single_product_summary' ,'bbloomer_wc_output_long_description',10);
function bbloomer_wc_output_long_description() {
  ?>
  <div class="woocommerce-tabs"><?php the_content(); ?></div>
<?php
}


/**
 * @snippet       WooCommerce Hide Prices on the Shop Page
 * @how-to        Watch tutorial @ http://businessbloomer.com/?p=19055
 * @sourcecode    http://businessbloomer.com/?p=406
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 2.4.7
 */

// Remove prices
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );


// First, let's remove related products from their original position
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// Second, let's add a new tab

add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
  $tabs['related_products'] = array(
    'title'     => __( 'Try it with', 'woocommerce' ),
    'priority'  => 50,
    'callback'  => 'woo_new_product_tab_content'
  );
  return $tabs;
}

// Third, let's put the related products inside

function woo_new_product_tab_content() {
  woocommerce_related_products();
}


// Move product tabs

// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60 );


// Add custom field to shop loop

// add_action( 'woocommerce_after_shop_loop_item_title', 'ins_woocommerce_product_excerpt', 35, 2);
if (!function_exists('ins_woocommerce_product_excerpt')) {
    function ins_woocommerce_product_excerpt() {
      global $post;
      if ( is_home() || is_shop() || is_product_category() || is_product_tag() ) {
        echo '<span class="excerpt">';
        echo get_post_meta( $post->ID, 'should_expect', true );
        echo '</span>';
      }
    }
}


/**
 * The do-action for cws_output_subtitle is called in the single-product template file.
 */
add_action( 'cws_output_subtitle', 'mycws_output_product_subtitle' );
function mycws_output_product_subtitle ( $my_text ) {
  echo '<div class="allura">' . $my_text . '</div>';
  return;
}

// add_action( 'woocommerce_product_thumbnails', 'cws_product_function_1');
function cws_product_function_1 ( ) {
  echo '<div class="quick">We can add some stuff here at YYY.</div>';
}
// add_action( 'woocommerce_product_meta_end', 'cws_product_function_2');
function cws_product_function_2 ( ) {
  echo '<div class="quick">We can add some stuff here at ZZZ.</div>';
}

// add_action( 'woocommerce_before_add_to_cart_form', 'cws_we_cover_areas');
function cws_we_cover_areas ( ) {
  $we_cover_areas = '<div><p class="quick kne-blue text-upper"> We cover 7 areas of focus in life</p><p class="quick kne-blue text-cap"> Community, meditation, movement, habits, Nutrition, & Declutter</p></div>';
  echo '<div class="quick">We can add some stuff here at XXX.</div>';
  echo $we_cover_areas;
}
