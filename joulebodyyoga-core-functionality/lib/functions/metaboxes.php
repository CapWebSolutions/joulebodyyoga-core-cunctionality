<?php
/**
 * Metaboxes
 *
 * This file registers any custom metaboxes
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Create Metaboxes
 * @since 1.0.0
 * @link http://www.billerickson.net/wordpress-metaboxes/
 */

function cws_metaboxes( $meta_boxes ) {
	$meta_boxes[] = array(
		'id' => 'cws-recipe-sections',
		'title' => 'Recipe Sections',
		'pages' => array('cws_recipe'), 
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, 
		'fields' => array(
			array(
				'name' => 'Did You Know',
				'desc' => 'Add a tidbit for this recipe.',
				'id' => 'cws-recipe-diy',
				'type' => 'wysiwyg',
				    'options' => array(
				        'wpautop' => true, 
				        'media_buttons' => true, 
				        'textarea_name' => 'cws_recipe_instr', 
				        'textarea_rows' => get_option('default_post_edit_rows', 2), 
				        'tabindex' => '',
				        'teeny' => true, // output the minimal editor config used in Press This
				        'tinymce' => true, 
   					),

			),
			array(
				'name' => 'Tip',
				'desc' => 'Add a Tip for this recipe.',
				'id' => 'cws-recipe-tip',
				'type' => 'wysiwyg',
				    'options' => array(
				        'wpautop' => true, 
				        'media_buttons' => true, 
				        'textarea_name' => 'cws_recipe_instr', 
				        'textarea_rows' => get_option('default_post_edit_rows', 2), 
				        'tabindex' => '',
				        'teeny' => true, // output the minimal editor config used in Press This
				        'tinymce' => true, 
   					),

			),
			array(
				'name' => 'Cooking Time',
				'desc' => 'Add the Cooking Time for this recipe.',
				'id' => 'cws-recipe-cookingtime',
				'type' => 'text'
			),
			array(
				'name' => 'Ingredients',
				'desc' => 'Add the ingredients for this recipe.',
				'id' => 'cws-recipe-ingredients',
				'type' => 'wysiwyg',
				    'options' => array(
				        'wpautop' => true, 
				        'media_buttons' => true, 
				        'textarea_name' => 'cws_recipe_instr', 
				        'textarea_rows' => get_option('default_post_edit_rows', 4), 
				        'tabindex' => '',
				        'teeny' => false, // output the minimal editor config used in Press This
				        'tinymce' => true, 
   					),

			),
			array(
				'name' => 'Instructions',
				'desc' => 'Add the Instructions for this recipe.',
				'id' => 'cws-recipe-instructions',
				'type' => 'wysiwyg',
				    'options' => array(
				        'wpautop' => true, 
				        'media_buttons' => true, 
				        'textarea_name' => 'cws_recipe_instr', 
				        'textarea_rows' => get_option('default_post_edit_rows', 4), 
				        'tabindex' => '',
				        'teeny' => false, // output the minimal editor config used in Press This
				        'tinymce' => true, 
   					),
			),
		),
	);
	
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes' , 'cws_metaboxes' );
 
 
/**
 * Initialize Metabox Class
 * @since 1.0.0
 * see /lib/metabox/example-functions.php for more information
 *
 */
  
function cws_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( CWS_DIR . '/lib/metabox/init.php' );
	}
}
add_action( 'init', 'cws_initialize_cmb_meta_boxes', 9999 );