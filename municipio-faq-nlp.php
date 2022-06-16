<?php

/**
 * Plugin Name:       Municipio FAQ NLP Classification
 * Plugin URI:        https://github.com/municipio-faq-nlp-classification/municipio-faq-nlp
 * Description:       Automaticly create taxonomies on FAQ questions and link to relevant articles
 * Version:           1.0.0
 * Author:            Sebastian Thulin
 * Author URI:        https://github.com/municipio-faq-nlp-classification
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       municipio-faq-nlp
 * Domain Path:       /languages
 */

 // Protect agains direct file access
if (! defined('WPINC')) {
    die;
}

define('MUNICIPIO_FAQ_NLP_PATH', plugin_dir_path(__FILE__));
define('MUNICIPIO_FAQ_NLP_URL', plugins_url('', __FILE__));
define('MUNICIPIO_FAQ_NLP_TEMPLATE_PATH', MUNICIPIO_FAQ_NLP_PATH . 'templates/');
define('MUNICIPIO_FAQ_NLP_TEXT_DOMAIN', 'municipio-faq-nlp');

load_plugin_textdomain(MUNICIPIO_FAQ_NLP_TEXT_DOMAIN, false, MUNICIPIO_FAQ_NLP_PATH . '/languages');

require_once MUNICIPIO_FAQ_NLP_PATH . 'Public.php';

// Register the autoloader
require __DIR__ . '/vendor/autoload.php';

// Acf auto import and export
add_action('acf/init', function () {
    $acfExportManager = new \AcfExportManager\AcfExportManager();
    $acfExportManager->setTextdomain('municipio-faq-nlp');
    $acfExportManager->setExportFolder(MUNICIPIO_FAQ_NLP_PATH . 'source/php/AcfFields/');
    $acfExportManager->autoExport(array(
        'municipio-faq-nlp-settings' => 'group_61ea7a87e8aaa' //Update with acf id here, settings view
    ));
    $acfExportManager->import();
});

// Start application
new MunicipioFaqNlp\App();
