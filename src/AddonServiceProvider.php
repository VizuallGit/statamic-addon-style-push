<?php

namespace Vizuall\StylePush;

use Statamic\Providers\AddonServiceProvider as BaseAddonServiceProvider;
use Vizuall\StylePush\Http\Middleware\InjectAssets;

class AddonServiceProvider extends BaseAddonServiceProvider
{
    protected $tags = [
        Tags\StylePush::class,
        Tags\ScriptPush::class,
        Tags\YieldStyles::class,
        Tags\YieldScripts::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            InjectAssets::class,
        ],
    ];
}
