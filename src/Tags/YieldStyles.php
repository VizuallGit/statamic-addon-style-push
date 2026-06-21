<?php

namespace Vizuall\StylePush\Tags;

use Statamic\Tags\Tags;

class YieldStyles extends Tags
{
    const PLACEHOLDER = '<!-- __YIELD_STYLES__ -->';
    protected static $handle = 'yield_styles';

    public function index(): string
    {
        return self::PLACEHOLDER;
    }
}
