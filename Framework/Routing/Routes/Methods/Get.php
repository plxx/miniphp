<?php

namespace Framework\Routing\Routes\Methods;

use Framework\Routing\Routes\Contracts\AbstractRoute;

readonly class Get extends AbstractRoute
{
    public function method(): string
    {
        return 'GET';
    }
}