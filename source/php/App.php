<?php

namespace MunicipioFaqNlp;

class App
{
    private $cacheBust = null;

    public function __construct()
    {
        //Init
        new PostType();
        new Classify();

        //Init cachebust
        $this->cacheBust = new \MunicipioFaqNlp\Helper\CacheBust();

        //Enqueue scripts & styles
        add_action('admin_enqueue_scripts', array($this, 'enqueueStyles'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueScripts'));
    }

    /**
     * Enqueue required style
     * @return void
     */
    public function enqueueStyles()
    {
        wp_register_style(
            'municipio-faq-nlp-css',
            MUNICIPIO_FAQ_NLP_URL . '/dist/' .
            $this->cacheBust->name('css/municipio-faq-nlp.css')
        );

        wp_enqueue_style('municipio-faq-nlp-css');
    }

    /**
     * Enqueue required scripts
     * @return void
     */
    public function enqueueScripts()
    {
        wp_register_script(
            'municipio-faq-nlp-js',
            MUNICIPIO_FAQ_NLP_URL . '/dist/' .
            $this->cacheBust->name('js/municipio-faq-nlp.js')
        );

        wp_enqueue_script('municipio-faq-nlp-js');
    }
}
