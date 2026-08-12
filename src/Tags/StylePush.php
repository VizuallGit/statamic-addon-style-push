<?php

namespace Vizuall\StylePush\Tags;

use Statamic\Tags\Tags;

class StylePush extends Tags
{
    protected static $handle = 'style_push';
    protected static array $stack = [];

    /** md5 af hver blok der allerede står i stakken. */
    protected static array $seen = [];

    /**
     * Samme blok skrives ud én gang, uanset hvor mange gange den pushes.
     *
     * En partial der bruges ti gange på en side, pusher sin CSS ti gange — men
     * det er den samme CSS, og ti ens regler gør intet ud over at fylde.
     * Sammenlignet på indhold, ikke på hvem der pushede: to forskellige
     * partials der tilfældigvis skriver det samme, er også kun værd at skrive
     * én gang.
     *
     * Uden det her vokser <style>-blokken med antallet af sektioner på siden i
     * stedet for med antallet af forskellige designs.
     */
    public function index(): string
    {
        $css = $this->parse();
        $hash = md5($css);

        if (! in_array($hash, static::$seen)) {
            static::$seen[] = $hash;
            static::$stack[] = $css;
        }

        return '';
    }

    public static function getAll(): string
    {
        return implode('', static::$stack);
    }
}
