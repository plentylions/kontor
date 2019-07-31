<?php

namespace Kontor\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\TemplateContainer;
use IO\Helper\ResourceContainer;
use IO\Extensions\Functions\Partial;
use Plenty\Plugin\ConfigRepository;


/**
 * Class KontorServiceProvider
 * @package Kontor\Providers
 */
class KontorServiceProvider extends ServiceProvider
{
    const PRIORITY = 0;

    public function register()
    {

    }

    public function boot(Twig $twig, Dispatcher $dispatcher, ConfigRepository $config)
    {
        $dispatcher->listen('IO.init.templates', function (Partial $partial)
        {
            $partial->set('head', 'Ceres::PageDesign.Partials.Head');
            $partial->set('header', 'Ceres::PageDesign.Partials.Header.Header');
            $partial->set('page-design', 'Ceres::PageDesign.PageDesign');
            $partial->set('footer', 'Ceres::PageDesign.Partials.Footer');

            $partial->set('footer', 'Kontor::PageDesign.Partials.Footer');
        }, self::PRIORITY);

        $dispatcher->listen('IO.Resources.Import', function (ResourceContainer $container) {
            $container->addStyleTemplate('Kontor::Stylesheet');
        }, self::PRIORITY);
    }
}

