<?php

namespace Vizuall\StylePush\Tags;

use Statamic\Tags\Tags;

class YieldStyles extends Tags
{
    protected static $handle = 'yield_styles';

    public function index(): string
    {
        $content = StylePush::getAll();

        $content = preg_replace('!<style[^>]*>|</style>!i', '', $content);
        $content = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $content);
        $content = preg_replace('/\s+/', ' ', $content);
        $content = preg_replace('/\s*([:;{},])\s*/', '$1', $content);
        $content = trim($content);

        return $content ? "<style>{$content}</style>" : '';
    }
}
