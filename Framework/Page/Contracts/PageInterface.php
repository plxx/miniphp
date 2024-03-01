<?php

namespace Framework\Page\Contracts;

interface PageInterface
{
    public function render(): string;
}