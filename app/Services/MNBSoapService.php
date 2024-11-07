<?php

namespace App\Services;

use SoapClient;

class MNBSoapService
{
    protected $client;

    public function __construct()
    {
        $this->client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
    }

    public function getCurrentExchangeRates()
    {
        $response = $this->client->GetCurrentExchangeRates()->GetCurrentExchangeRatesResult;
        return (array)simplexml_load_string($response);
    }

    public function getExchangeRateForDate($currency, $date)
    {
        $xmlResponse = $this->client->GetExchangeRates([
            'startDate' => $date,
            'endDate' => $date,
            'currencyNames' => $currency,
        ])->GetExchangeRatesResult;

        return (array)simplexml_load_string($xmlResponse);
    }

    public function getMonthlyExchangeRates($currency, $startDate, $endDate)
    {
        $xmlResponse = $this->client->GetExchangeRates([
            'startDate' => $startDate,
            'endDate' => $endDate,
            'currencyNames' => $currency,
        ])->GetExchangeRatesResult;

        return (array)simplexml_load_string($xmlResponse);
    }
}
