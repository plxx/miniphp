<?php

namespace Framework\Routing\Routes\Methods;

use Framework\Routing\Routes\Contracts\AbstractRoute;

readonly class Post extends AbstractRoute
{
    public function method(): string
    {
        return 'POST';
    }
}