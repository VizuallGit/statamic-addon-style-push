<?php

namespace Vizuall\StylePush\Tags;

use Statamic\Tags\Tags;

class ScriptPush extends Tags
{
    protected static $handle = 'script_push';
    protected static array $stack = [];

    /** md5 af hver blok der allerede står i stakken. */
    protected static array $seen = [];

    /** Samme blok skrives ud én gang — se {@see StylePush::index()}. */
    public function index(): string
    {
        $js = $this->parse();
        $hash = md5($js);

        if (! in_array($hash, static::$seen)) {
            static::$seen[] = $hash;
            static::$stack[] = $js;
        }

        return '';
    }

    public static function getAll(): string
    {
        return implode('', static::$stack);
    }
}
