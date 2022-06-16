<?php

namespace MunicipioFaqNlp;

class PostType
{
    public function __construct()
    {
        add_action('init', array($this, 'registerPostTypeFAQ'));
    }

    public function registerPostTypeFAQ(): string
    {

        // Create posttype
        $postType = new Entity\PostType(
            _x('FAQs', 'Post type plural', 'municipio-faq-nlp'),
            _x('FAQ', 'Post type singular', 'municipio-faq-nlp'),
            'faq',
            array(
                'description'          =>   __('Questions and answers', 'municipio-faq-nlp'),
                'menu_icon'            =>   'status',
                'public'               =>   true,
                'publicly_queriable'   =>   true,
                'show_ui'              =>   true,
                'show_in_nav_menus'    =>   true,
                'has_archive'          =>   true,
                'hierarchical'          =>  false,
                'exclude_from_search'   =>  true,
                'taxonomies'            =>  array(),
                'supports'              =>  array('title', 'revisions', 'editor', 'page-attributes')
            )
        );

        return $postType->slug;
    }
}
