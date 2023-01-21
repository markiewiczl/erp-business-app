<?php

namespace App\Resolver;

interface CurrencyExchangeInterface
{
    public function getExchangeRate(string $currency): float;

    public function getCurrencies(): array;
}