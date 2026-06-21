<?php

namespace Vizuall\StylePush\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Vizuall\StylePush\Tags\ScriptPush;
use Vizuall\StylePush\Tags\StylePush;
use Vizuall\StylePush\Tags\YieldScripts;
use Vizuall\StylePush\Tags\YieldStyles;

class InjectAssets
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $content = $response->getContent();

        if (!is_string($content)) {
            return $response;
        }

        if (str_contains($content, YieldStyles::PLACEHOLDER)) {
            $css = StylePush::getAll();
            $css = preg_replace('!<style[^>]*>|</style>!i', '', $css);
            $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
            $css = preg_replace('/\s+/', ' ', $css);
            $css = preg_replace('/\s*([:;{},>~])\s*/', '$1', $css);
            $css = trim($css);
            $content = str_replace(YieldStyles::PLACEHOLDER, $css ? "<style>{$css}</style>" : '', $content);
        }

        if (str_contains($content, YieldScripts::PLACEHOLDER)) {
            $js = ScriptPush::getAll();
            $js = preg_replace('!<script[^>]*>|</script>!i', '', $js);
            $js = trim($js);
            $content = str_replace(YieldScripts::PLACEHOLDER, $js ? "<script>{$js}</script>" : '', $content);
        }

        $response->setContent($content);
        return $response;
    }
}
