<?php
/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */
declare(strict_types=1);

namespace Strategio\Component;

class AssetLoader
{
    /**
     * Manifest JSON file
     */
    const
        MANIFEST_PATH = __DIR__ . '/../../www/temp/static/manifest.json',
        JS_FILE_ALIAS = 'sys-frontend-build.js',
        CSS_FILE_ALIAS = 'sys-frontend-build.css'
    ;

    /**
     * @var array
     */
    protected array $content = [];


    /**
     * AssetLoader constructor.
     */
    public function __construct()
    {
        $content = file_get_contents(self::MANIFEST_PATH);
        $this->content = json_decode($content, TRUE);
    }


    /**
     * @return string
     */
    public function getJsFileName() : string
    {
        return $this->content[self::JS_FILE_ALIAS];
    }


    /**
     * @return string
     */
    public function getCssFileName() : string
    {
        return $this->content[self::CSS_FILE_ALIAS];
    }
}
