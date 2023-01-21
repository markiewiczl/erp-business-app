<?php

namespace App\Resolver;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CurrencyExchange implements CurrencyExchangeInterface
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getExchangeRate(string $currency): float
    {
        $response = $this->client->request(
            'GET',
            'http://api.nbp.pl/api/exchangerates/rates/a/'. $currency
        );

        $content = $response->toArray();

        return $content['rates'][0]['mid'];
    }

    public function getCurrencies(): array
    {
        $response = $this->client->request(
            'GET',
            'http://api.nbp.pl/api/exchangerates/tables/a'
        );

        $data = $response->toArray();

        return $data[0]['rates'];
    }
}