<?php
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page([
		'page_title' 	=> __('Temats inställningar', 'stf'),
		'menu_title'	=> __('Temainställningar', 'stf'),
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'manage_options',
	]);

	acf_add_options_sub_page([
		'page_title' 	=> __('Webbinställningar', 'stf'),
		'menu_title'	=> __('Webb', 'stf'),
		'parent_slug'	=> 'theme-settings',
	]);

	acf_add_options_sub_page([
		'page_title' 	=> __('Föreningsinställningar', 'stf'),
		'menu_title'	=> __('Föreningen', 'stf'),
		'parent_slug'	=> 'theme-settings',
	]);

	acf_add_options_sub_page([
		'page_title' 	=> __('Sidhuvudsinställningar', 'stf'),
		'menu_title'	=> __('Sidhuvud', 'stf'),
		'parent_slug'	=> 'theme-settings',
  ]);

	acf_add_options_sub_page([
		'page_title' 	=> __('Sidfotsinställningar', 'stf'),
		'menu_title'	=> __('Sidfot', 'stf'),
		'parent_slug'	=> 'theme-settings',
  ]);

}
