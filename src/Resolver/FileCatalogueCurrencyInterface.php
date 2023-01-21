<?php

namespace App\Resolver;

interface FileCatalogueCurrencyInterface
{
    public function convert(string $code, array $data): void;
}