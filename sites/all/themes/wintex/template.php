<?php
// Footheme by Adaptivethemes.com, a starter sub-sub-theme.

/**
 * Rename each function and instance of "footheme" to match
 * your subthemes name, e.g. if you name your theme "footheme" then the function
 * name will be "footheme_preprocess_hook". Tip - you can search/replace
 * on "footheme".
 */


/**
 * Override or insert variables into the html templates.
 * Replace 'footheme' with your themes name, i.e. mytheme_preprocess_html()
 */
function wintex_preprocess_html(&$vars) {

  // Load the media queries styles
  // If you change the names of these files they must match here - these files are
  // in the /css/ directory of your subtheme - the names must be identical!
  $media_queries_css = array(
    'wintex.responsive.style.css',
    'wintex.responsive.gpanels.css'
  );
  load_subtheme_media_queries($media_queries_css, 'wintex'); // Replace 'footheme' with your themes name

 /**
  * Load IE specific stylesheets
  * AT automates adding IE stylesheets, simply add to the array using
  * the conditional comment as the key and the stylesheet name as the value.
  *
  * See our online help: http://adaptivethemes.com/documentation/working-with-internet-explorer
  *
  * For example to add a stylesheet for IE8 only use:
  *
  *  'IE 8' => 'ie-8.css',
  *
  * Your IE CSS file must be in the /css/ directory in your subtheme.
  */
  /* -- Delete this line to add a conditional stylesheet for IE 7 or less.
  $ie_files = array(
    'lte IE 7' => 'ie-lte-7.css',
  );
  load_subtheme_ie_styles($ie_files, 'footheme'); // Replace 'footheme' with your themes name
  // */

}

function wintex_process_field(&$vars) {
  $element = $vars['element'];

  // Reduce number of images in teaser view mode to single image
  if ($element['#view_mode'] == 'node_teaser' && $element['#field_type'] == 'image') {
    $vars['items'] = array($vars['items'][0]);
  }
}

/**
 * Implements hook_form_alter().
 */
function wintex_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'commerce_checkout_form_checkout') {
    $form['customer_profile_billing']['commerce_customer_address'][LANGUAGE_NONE][0]['organisation_block']['organisation_name']['#required'] = TRUE;
    $form['customer_profile_shipping']['commerce_customer_address'][LANGUAGE_NONE][0]['organisation_block']['organisation_name']['#required'] = TRUE;
  }
}


