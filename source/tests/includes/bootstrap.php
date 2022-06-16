<?php

// Get around direct access blockers.
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/../../../');
}

define('MUNICIPIO_FAQ_NLP_PATH', __DIR__ . '/../../../');
define('MUNICIPIO_FAQ_NLP_URL', 'https://example.com/wp-content/plugins/' . 'modularity-municipio-faq-nlp');
define('MUNICIPIO_FAQ_NLP_TEMPLATE_PATH', MUNICIPIO_FAQ_NLP_PATH . 'templates/');


// Register the autoloader
$loader = require __DIR__ . '/../../../vendor/autoload.php';
$loader->addPsr4('MunicipioFaqNlp\\Test\\', __DIR__ . '/../php/');

require_once __DIR__ . '/PluginTestCase.php';
