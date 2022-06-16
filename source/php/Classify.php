<?php

namespace MunicipioFaqNlp;

class Classify
{
    public function __construct()
    {
        add_action('save_post', array($this, 'classify'), 50, 3);
    }

    private function shouldClassify($postId): boolean
    {
        return in_array(
            get_post_type($postId),
            ['faq']
        );
    }

    private function translate($text, $fromLang, $toLang = 'en_GB'): string
    {
        return $text;
    }

    private function makeClassification($text)
    {
        return [];
    }

    private function classify($postId, $post, $update): array
    {
        if ($this->shouldClassify($postId)) {
            $text = $this->translate(
                strip_tags($post->post_content),
                get_locale()
            );
        }

        if (!is_null($text)) {
            return $this->makeClassification($text);
        }

        return [];
    }
}
