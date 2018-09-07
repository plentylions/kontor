<?php

namespace Kontor\Containers;

use Plenty\Plugin\Templates\Twig;

class KontorContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('Kontor::Stylesheet');
    }
}