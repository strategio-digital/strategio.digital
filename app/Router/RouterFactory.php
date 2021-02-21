<?php
/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */
declare(strict_types=1);

namespace Strategio\Router;

use Strategio\Controller\AppController;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Route;

class RouterFactory extends AbstractRouter
{
    /**
     * Docs: https://symfony.com/doc/current/components/routing.html
     * @return UrlMatcher
     */
    public function createRoutes() : UrlMatcher
    {
        // Homepage
        $this->routeCollection->add('app', new Route('/', [
            '_controller' => AppController::class,
            '_action' => 'index',
            'template' => 'home'
        ]));

        // Ajax Contact Form
        $this->routeCollection->add('contact-form', new Route('/ajax/contact-form', [
            '_controller' => AppController::class,
            '_action' => 'contactForm',
        ]));

        // Pages
        $this->routeCollection->add('app-other', new Route('/{template}', [
            '_controller' => AppController::class,
            '_action' => 'index',
        ]));

        return parent::createRoutes();
    }
}
