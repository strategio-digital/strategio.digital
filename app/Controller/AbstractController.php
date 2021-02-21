<?php
/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */
declare(strict_types=1);

namespace Strategio\Controller;

use Latte\Engine as LatteEngine;
use Strategio\Component\AssetLoader;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController
{
    /**
     * @var Request
     */
    protected Request $request;


    /**
     * @var LatteEngine
     */
    protected LatteEngine $latteEngine;


    /**
     * @var array
     */
    protected array $latteParams = [];


    /**
     * Dependencies
     * AbstractController constructor.
     */
    public function __construct()
    {
        $this->setupRequest();
        $this->setupLatteEngine();
        $this->setupAssetLoader();
    }


    /**
     * Request
     */
    private function setupRequest() : void
    {
        $this->request = Request::createFromGlobals();
    }


    /**
     * Latte Engine
     */
    private function setupLatteEngine() : void
    {
        $this->latteEngine = new LatteEngine;
        $this->latteEngine->setTempDirectory(__DIR__ . '/../../cache/latte');
    }


    /**
     * Asset Loader
     */
    private function setupAssetLoader() : void
    {
        $assetLoader = new AssetLoader;

        $this->latteParams['assetLoader'] = [
            'css' => $assetLoader->getCssFileName(),
            'js' => $assetLoader->getJsFileName()
        ];
    }
}
