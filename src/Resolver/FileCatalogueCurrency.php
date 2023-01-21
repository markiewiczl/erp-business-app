<?php

namespace App\Resolver;

use App\Entity\FileCatalogue;

class FileCatalogueCurrency
{
    private CurrencyExchange $currencyExchange;

    public function __construct(CurrencyExchange $currencyExchange)
    {
        $this->currencyExchange = $currencyExchange;
    }

    public function convert(string $code, array $data): void
    {
        $currencies = $this->currencyExchange->getCurrencies();

        $rate = null;

        foreach ($currencies as $currency) {
            if ($currency['code'] === $code) {
                $rate = $currency['mid'];
            }
        }

        foreach ($data as $fileCatalogue) {
            /** @var FileCatalogue $fileCatalogue */
            $price = $fileCatalogue->getFileNetPrice();
            $fileCatalogue->setFileNetPrice(round($price / $rate, 2));
        }
    }
}