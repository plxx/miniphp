<?php

namespace Pages;

use Framework\Page\Contracts\PageInterface;

class DefaultPage implements PageInterface
{
    public function render(): string
    {
        return 'Hello from DefaultPage';
    }
}