<?php

namespace Framework\Core;

use Framework\Http\Constants\HttpStatusCode;
use Framework\Http\Contracts\RequestInterface;
use Framework\Http\Contracts\ResponseInterface;
use Framework\Http\Request;
use Framework\Http\Response;
use Framework\Routing\Router\Contracts\RouterInterface;
use Framework\Routing\Router\Router;

class Kernel
{
    private RouterInterface $router;
    private RequestInterface $request;
    private ResponseInterface $response;

    public function __construct()
    {
        $this->router = new Router();
        $this->request = new Request(
            $_SERVER['REQUEST_METHOD'],
            $_SERVER['REQUEST_URI']
        );
        $this->response = new Response();
    }

    public function run(): void
    {
        $page = $this->router->handleRequest($this->request);

        if ($page === null) {
            $this->response->setStatusCode(HttpStatusCode::STATUS_404);
            $this->response->setBody('Page not found');
            $this->response->send();
        }

        $content = $page->render();

        $this->response->setBody($content);
        $this->response->send();
    }
}