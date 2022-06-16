<?php
namespace MunicipioFaqNlp;

use MunicipioFaqNlp\App;

use Brain\Monkey\Functions;
use Mockery;

class AppTest extends \PluginTestCase\PluginTestCase
{
    public function testAddHooks()
    {
        new App();
    
        self::assertNotFalse(has_action('admin_enqueue_scripts', 'MunicipioFaqNlp\App->enqueueStyles()'));
        self::assertNotFalse(has_action('admin_enqueue_scripts', 'MunicipioFaqNlp\App->enqueueScripts()'));
    }

    public function testEnqueueStyles()
    {
        Functions\expect('wp_register_style')->once();
        Functions\expect('wp_enqueue_style')->once()->with('municipio-faq-nlp-css');

        $app = new App();

        $app->enqueueStyles();
    }

    public function testEnqueueScripts()
    {
        Functions\expect('wp_register_script')->once();
        Functions\expect('wp_enqueue_script')->once()->with('municipio-faq-nlp-js');

        $app = new App();

        $app->enqueueScripts();
    }
}
