<?php
/**
 * Taxonomies
 *
 * This file registers any custom taxonomies
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

add_action( 'init', 'cws_register_cpt_taxonomies' );
function cws_register_cpt_taxonomies() {
	$labels = array(
		"name" => __( 'Appropriate For Tags', '' ),
		"singular_name" => __( 'Appropriate For Tag', '' ),
		);

	$args = array(
		"label" => __( 'Appropriate For Tags', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Appropriate For Tags",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'appropriate-for', 'with_front' => false, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "appropriate-for", array( "cws_recipe" ), $args );

	$labels = array(
		"name" => __( 'Keywords', '' ),
		"singular_name" => __( 'Keyword', '' ),
		);

	$args = array(
		"label" => __( 'Keywords', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Keywords",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'keyword', 'with_front' => false, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "keyword", array( "cws_recipe" ), $args );

	$labels = array(
		"name" => __( 'Difficulty Levels', '' ),
		"singular_name" => __( 'Difficulty Level', '' ),
		);

	$args = array(
		"label" => __( 'Difficulty Levels', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Difficulty Levels",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'difficulty-level', 'with_front' => false, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "difficulty-level", array( "cws_recipe" ), $args );

	$labels = array(
		"name" => __( 'Recipe Categories', '' ),
		"singular_name" => __( 'Recipe Category', '' ),
		);

	$args = array(
		"label" => __( 'Recipe Categories', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Recipe Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'recipe-category', 'with_front' => false, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "recipe-category", array( "cws_recipe" ), $args );

// End cws_register_cpt_taxonomies()
}



// Show custom taxonomy 
add_filter( 'post_meta', 'cws_add_custom_recipe_post_meta' );
function cws_add_custom_recipe_post_meta( $post_meta ) {

  if ( is_singular( 'cws_recipe' ) || is_post_type_archive( 'cws_recipe' ) ||  is_tax( 'applicable-for' ) || is_tax( 'keyword' ) ) {
      $post_meta = '[post_terms taxonomy="applicable-for" before="Applicable For: "]<br>  [post_terms taxonomy="keyword" before="Keyword(s): "]';
  }
  return $post_meta;

}