<?php
/**
 * Post Types
 *
 * This file registers any custom post types
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


/**
 * The code to register a WordPress Custom Post Type (CPT) `cws_recipe`
 * @package cws_recipe
 */

add_action( 'init', 'cws_recipe_cpt' );
function cws_recipe_cpt() {
	$labels = array(
		"name" => __( 'recipes', '' ),
		"singular_name" => __( 'Recipe', '' ),
		"menu_name" => __( 'My Recipes', '' ),
		"all_items" => __( 'All Recipes', '' ),
		"add_new" => __( 'Add New Recipe', '' ),
		"add_new_item" => __( 'Add New Recipe', '' ),
		"edit_item" => __( 'Edit Recipe', '' ),
		"new_item" => __( 'New Recipe', '' ),
		"view_item" => __( 'View Recipe', '' ),
		"search_items" => __( 'Search Recipes', '' ),
		"not_found" => __( 'No Recipes Found', '' ),
		"not_found_in_trash" => __( 'No Recipes in Trash', '' ),
		"featured_image" => __( 'Recipe Image', '' ),
		"set_featured_image" => __( 'Set Recipe Image', '' ),
		"remove_featured_image" => __( 'Remove Recipe Image', '' ),
		"use_featured_image" => __( 'Use as Recipe Image', '' ),
		"archives" => __( 'Recipe Archives', '' ),
		"insert_into_item" => __( 'Insert into recipes', '' ),
		"uploaded_to_this_item" => __( 'Uploaded to this recipe', '' ),
		"filter_items_list" => __( 'Filter Recipe List', '' ),
		"items_list_navigation" => __( 'Recipe List Navigation', '' ),
		"items_list" => __( 'Recipe List', '' ),
		);

	$args = array(
		"label" => __( 'Recipes', 'cws_recipe' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( 
			"slug" => _x( "recipes", 'CPT permalink slug', 'cws_recipe' ),
			"with_front" => false,
			),
		"query_var" => true,
		"menu_icon" => "dashicons-carrot",
		/**
		 * 'title', 'editor', 'thumbnail' 'author', 'excerpt','custom-fields',
		 * 'page-attributes' (menu order),'revisions' (will store revisions),
		 * 'trackbacks', 'comments', 'post-formats',
		 */
		"supports" => array( "title", 'editor', "thumbnail" ),
	);

	register_post_type( "cws_recipe", $args );


// End of cws_recipe_cpt()
}
// Add our Custom Post Type to feed
// Ref: https://yoast.com/dev-blog/custom-post-type-snippets/
function add_cpt_to_feed( $qv ) {
  if ( isset($qv['feed']) && !isset($qv['post_type']) )
    $qv['post_type'] = array('post', 'cws_recipe');
  return $qv;
}

add_filter( 'request', 'add_cpt_to_feed' );

/**
 * Adding Support for  CPT to Divi
 */
function cws_et_builder_post_types( $post_types ) {
    $post_types[] = 'cws_recipe';
    $post_types[] = 'product';
    // $post_types[] = 'ANOTHER_CPT_HERE';

    return $post_types;
}
add_filter( 'et_builder_post_types', 'cws_et_builder_post_types' );