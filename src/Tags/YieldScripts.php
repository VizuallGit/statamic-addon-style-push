<?php

namespace Vizuall\StylePush\Tags;

use Statamic\Tags\Tags;

class YieldScripts extends Tags
{
    protected static $handle = 'yield_scripts';

    public function index(): string
    {
        $content = ScriptPush::getAll();

        $content = preg_replace('!<script[^>]*>|</script>!i', '', $content);
        $content = trim($content);

        return $content ? "<script>{$content}</script>" : '';
    }
}
