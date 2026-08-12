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
        // Det gamle navn for YieldStyles. Skal blive stående: et manglende tag
        // fejler ikke i Antlers, det render bare tomt — og så er al pushet CSS
        // væk fra siden uden en fejlmeddelelse nogen steder.
        Tags\YieldMinified::class,
        Tags\YieldScripts::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            InjectAssets::class,
        ],
    ];
}
