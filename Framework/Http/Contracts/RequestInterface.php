<?php

namespace Framework\Http\Contracts;

interface RequestInterface
{
    public function getMethod(): string;

    public function getUri(): string;
}