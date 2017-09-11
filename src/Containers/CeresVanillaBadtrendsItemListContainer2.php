<?php

namespace CeresVanillaBadtrends\Containers;

use Plenty\Plugin\Templates\Twig;

class CeresVanillaBadtrendsItemListContainer2
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('CeresVanillaBadtrends::Containers.ItemLists.ItemList2', ["item" => $arg[0]]);
    }
}