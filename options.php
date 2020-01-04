<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */
function optionsframework_option_name() {

    // This gets the theme name from the stylesheet
    $themename = wp_get_theme();
    $themename = preg_replace("/\W/", "_", strtolower($themename));

    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {

    $options = array();

    $options[] = array(
        'name' => __('Header Settings', 'options_framework'),
        'type' => 'heading');

    $options[] = array(
        'name' => __('Logo', 'options_framework_theme'),
        'desc' => __('Upload Header Logo.', 'options_framework'),
        'id' => 'header_logo',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Header Top Lable', 'options_framework_theme'),
        'desc' => __('Add Header Top Lable', 'options_framework'),
        'id' => 'header_top_lable',
        'type' => 'text');

    $options[] = array(
        'name' => __('Free Consultation', 'options_framework_theme'),
        'desc' => __('Add Free Consultation Text', 'options_framework'),
        'id' => 'add_free_consultation',
        'type' => 'text');
	
	$options[] = array(
		'name' => __('Free Consultation Mail Id', 'options_framework_theme'),
		'desc' => __('Add Free Consultation Text Mail Id', 'options_framework'),
		'id' => 'add_free_consultation_mail_id',
		'type' => 'text');

    $options[] = array(
        'name' => __('Phone Number Text', 'options_framework_theme'),
        'desc' => __('Add Phone Number', 'options_framework'),
        'id' => 'add_phone_number',
        'type' => 'text');
		
	 $options[] = array(
        'name' => __('Phone Number', 'options_framework_theme'),
        'desc' => __('Add Phone Number', 'options_framework'),
        'id' => 'add_phone_number_number',
        'type' => 'text');
    
     $options[] = array(
        'name' => __('Twitter URL', 'options_framework_theme'),
        'desc' => __('Enter twitter URL for display in Header', 'options_framework'),
        'id' => 'twitter_url',
        'type' => 'text');
    
     $options[] = array(
        'name' => __('Facebook URL', 'options_framework_theme'),
        'desc' => __('Enter facebook URL for display in Header', 'options_framework'),
        'id' => 'facebook_url',
        'type' => 'text');
     
      $options[] = array(
        'name' => __('Linked In URL', 'options_framework_theme'),
        'desc' => __('Enter LinkedIn URL for display in Header', 'options_framework'),
        'id' => 'linkedin_url',
        'type' => 'text');
      
	  $options[] = array(
        'name' => __('Skype In URL', 'options_framework_theme'),
        'desc' => __('Enter Skype URL for display in Header', 'options_framework'),
        'id' => 'skype_url',
        'type' => 'text');
   

    $options[] = array(
        'name' => __('YouTube URL', 'options_framework_theme'),
        'desc' => __('Enter YouTube URL for display in Header', 'options_framework'),
        'id' => 'youtube_url',
        'type' => 'text');

    return $options;
}
