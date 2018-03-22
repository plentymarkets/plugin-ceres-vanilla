<?php

namespace CeresVanillaBadtrends\Containers;

use Plenty\Plugin\Templates\Twig;

class CeresVanillaBadtrendsItemListContainer1
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('CeresVanillaBadtrends::Containers.ItemLists.ItemList1', ["item" => $arg[0]]);
    }
}