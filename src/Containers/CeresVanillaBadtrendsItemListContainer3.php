<?php

namespace CeresVanillaBadtrends\Containers;

use Plenty\Plugin\Templates\Twig;

class CeresVanillaBadtrendsItemListContainer3
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('CeresVanillaBadtrends::Containers.ItemLists.ItemList3', ["item" => $arg[0]]);
    }
}