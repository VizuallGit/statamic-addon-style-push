<?php

namespace Vizuall\StylePush;

use Statamic\Providers\AddonServiceProvider as BaseAddonServiceProvider;

class AddonServiceProvider extends BaseAddonServiceProvider
{
    protected $tags = [
        Tags\StylePush::class,
        Tags\ScriptPush::class,
        Tags\YieldStyles::class,
        Tags\YieldScripts::class,
    ];
}
