<?php

namespace Framework\Routing\Router\Contracts;

use Framework\Http\Contracts\RequestInterface;
use Framework\Page\Contracts\PageInterface;

interface RouterInterface
{
    public function handleRequest(RequestInterface $request): ?PageInterface;
}