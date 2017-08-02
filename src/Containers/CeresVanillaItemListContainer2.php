<?php

namespace CeresVanilla\Containers;

use Plenty\Plugin\Templates\Twig;

class CeresVanillaItemListContainer2
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('CeresVanilla::Containers.ItemLists.ItemList2', ["item" => $arg[0]]);
    }
}