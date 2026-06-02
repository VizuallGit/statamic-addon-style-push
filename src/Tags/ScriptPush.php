<?php

namespace Vizuall\StylePush\Tags;

use Statamic\Tags\Tags;

class ScriptPush extends Tags
{
    protected static $handle = 'script_push';
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
