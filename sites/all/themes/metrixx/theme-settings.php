<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function metrixx_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['prof_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Metrixx Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['prof_settings']['breadcrumbs'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show breadcrumbs in a page'),
    '#default_value' => theme_get_setting('breadcrumbs','metrixx'),
    '#description'   => t("Check this option to show breadcrumbs in page. Uncheck to hide."),
  );
  $form['prof_settings']['top_social_link'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social links in header'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['prof_settings']['top_social_link']['social_links'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show social icons (Facebook, Twitter and RSS) in header'),
    '#default_value' => theme_get_setting('social_links', 'metrixx'),
    '#description'   => t("Check this option to show twitter, facebook, google plus, linkedin, skype, vimeo and rss icons in header. Uncheck to hide."),
  );
  $form['prof_settings']['top_social_link']['twitter_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter Url'),
    '#default_value' => theme_get_setting('twitter_url', 'metrixx'),
    '#description' => t("Enter your Twitter Url."),
  );
  $form['prof_settings']['top_social_link']['facebook_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Url'),
    '#default_value' => theme_get_setting('facebook_url', 'metrixx'),
    '#description' => t("Enter your Facebook URL."),
  );
  $form['prof_settings']['top_social_link']['googleplus_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Plus Url'),
    '#default_value' => theme_get_setting('googleplus_url', 'metrixx'),
    '#description' => t("Enter your Google Plus URL."),
  );
  $form['prof_settings']['top_social_link']['linkedin_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Linked in Url'),
    '#default_value' => theme_get_setting('linkedin_url', 'metrixx'),
    '#description' => t("Enter your Linkedin URL."),
  );
  $form['prof_settings']['top_social_link']['skype_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Skype Url'),
    '#default_value' => theme_get_setting('skype_url', 'metrixx'),
    '#description' => t("Enter your Skype URL."),
  );
  $form['prof_settings']['top_social_link']['vimeo_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Vimeo Url'),
    '#default_value' => theme_get_setting('vimeo_url', 'metrixx'),
    '#description' => t("Enter your Vimeo Url."),
  );
}


