<?php
/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */
declare(strict_types=1);

namespace Strategio\Controller;

use Symfony\Component\HttpFoundation\Response;

interface IController
{
    /**
     * @param string $template
     * @return Response
     */
    public function index(string $template) : Response;
}
