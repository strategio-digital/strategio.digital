<?php
/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */
declare(strict_types=1);

namespace Strategio\Router;

use Strategio\Controller\ErrorController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

abstract class AbstractRouter
{
    /**
     * @var Request
     */
    protected Request $request;


    /**
     * @var RequestContext
     */
    protected RequestContext $requestContext;


    /**
     * @var RouteCollection
     */
    protected RouteCollection $routeCollection;


    /**
     * Dependencies
     * RouterFactory constructor.
     */
    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->requestContext = (new RequestContext)->fromRequest($this->request);
        $this->routeCollection = new RouteCollection;
    }

    /**
     * Docs: https://symfony.com/doc/current/components/routing.html
     * @return UrlMatcher
     */
    public function createRoutes() : UrlMatcher
    {
        //$this->routeCollection->add('home', new Route('/', ['_controller' => HomeController::class]))
        return new UrlMatcher($this->routeCollection, $this->requestContext);
    }


    /**
     * Get Controller data
     * @param UrlMatcher $matcher
     * @return array
     */
    public function matchAsController(UrlMatcher $matcher) : array
    {
        try {
            $controllerData = $matcher->matchRequest($this->request);
        } catch (\Exception $exception) {
            $controllerData = ['_controller' => ErrorController::class];
        }

        return $controllerData;
    }
}
