<?php

namespace CeresVanillaBadtrends\Containers;

use Plenty\Plugin\Templates\Twig;

class CeresVanillaBadtrendsContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('CeresVanillaBadtrends::Stylesheet');
    }
}