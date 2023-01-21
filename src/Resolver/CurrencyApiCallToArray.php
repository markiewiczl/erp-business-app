<?php

namespace App\Resolver;

class CurrencyApiCallToArray implements CurrencyApiCallToArrayInterface
{
    private CurrencyExchange $currencyExchange;

    public function __construct(CurrencyExchange $currencyExchange)
    {
        $this->currencyExchange = $currencyExchange;
    }

    public function convert(): array
    {
        $data[] = [];

        foreach ($this->currencyExchange->getCurrencies() as $currency) {
            $data[$currency['currency']] = $currency['code'];
        }

        return $data;
    }
}