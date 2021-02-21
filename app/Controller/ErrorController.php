<?php
/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */
declare(strict_types=1);

namespace Strategio\Controller;

use Symfony\Component\HttpFoundation\Response;

class ErrorController extends AbstractController implements IController
{
    /**
     * @param string $template
     * @return Response
     */
    public function index(string $template) : Response
    {
        $html = $this->latteEngine->renderToString(__DIR__ . '/../Template/presenter/error.latte', $this->latteParams);

        $response = new Response($html, Response::HTTP_NOT_FOUND);
        return $response->send();
    }
}
