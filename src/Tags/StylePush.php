<?php

namespace Vizuall\StylePush\Tags;

use Statamic\Tags\Tags;

class StylePush extends Tags
{
    protected static $handle = 'style_push';
    protected static array $stack = [];

    public function index(): string
    {
        static::$stack[] = $this->parse();
        return '';
    }

    public static function getAll(): string
    {
        return implode('', static::$stack);
    }
}
