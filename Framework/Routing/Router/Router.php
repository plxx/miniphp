<?php

namespace Framework\Routing\Router;

use Framework\Http\Contracts\RequestInterface;
use Framework\Page\Contracts\PageInterface;
use Framework\Routing\Router\Contracts\RouterInterface;
use Framework\Routing\Routes\Contracts\AbstractRoute;

class Router implements RouterInterface
{
    private array $routes = [];

    public function __construct()
    {
        $routes = require(__DIR__ . '/../../../routes/web.php');

        foreach ($routes as $route) {
            if ($route instanceof AbstractRoute) {
                $this->routes[$route->method()] = [
                    $route->getPath() => $route->getPage()
                ];
            }
        }
    }

    public function handleRequest(RequestInterface $request): ?PageInterface
    {
        foreach ($this->routes as $method => $routes) {
            if ($method !== $request->getMethod()) {
                continue;
            }

            foreach ($routes as $route => $page) {
                $pattern = preg_replace('/{(\w+)}/', '(?P<$1>[^/]+)', $route);
                $pattern = "@^" . $pattern . "$@i";

                if (preg_match($pattern, $request->getUri(), $matches)) {
                    array_shift($matches);

                    if (! class_exists($page)) {
                        return null;
                    }

                    if (! in_array(PageInterface::class, class_implements($page), true)) {
                        return null;
                    }

                    return new $page;
                }
            }
        }

        return null;
    }
}