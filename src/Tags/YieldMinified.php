<?php

namespace Vizuall\StylePush\Tags;

/**
 * Det gamle navn for {@see YieldStyles}.
 *
 * Tagget hed `yield_minified` før addonet fandtes, og det står stadig i
 * skabeloner ude i projekterne. Et tag der ikke findes, giver ingen fejl i
 * Antlers — det render bare til ingenting, og så forsvinder al pushet CSS fra
 * siden uden at nogen får besked. Derfor en alias frem for en omdøbning.
 *
 * Samme placeholder som forælderen, så middlewaren behandler de to ens. Nye
 * skabeloner bør skrive `yield_styles`; den her er her for de gamle.
 */
class YieldMinified extends YieldStyles
{
    protected static $handle = 'yield_minified';
}
