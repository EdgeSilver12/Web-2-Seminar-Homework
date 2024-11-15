<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use DateTime;
use Exception;
use SoapFault;

class MNBController extends Controller
{
//    public function showDailyExchangeRate(Request $request)
//    {
//        try {
//            $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
//            $response = $client->GetCurrentExchangeRates();
//            $array = (array)simplexml_load_string($response->GetCurrentExchangeRatesResult);
//
//            $date = $array['Day']['@attributes']['date'];
//            $exchangeRates = $array['Day']['Rate'];
//
//            return view('exchange_rate', compact('date', 'exchangeRates'));
//        } catch (SoapFault $e) {
//            return back()->withErrors(['error' => 'SOAP request failed: ' . $e->getMessage()]);
//        } catch (Exception $e) {
//            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
//        }
//    }
    public function showDailyExchangeRate()
    {
        try {
            // Create a new SOAP client
            $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");

            // Get current exchange rates
            $response = $client->GetCurrentExchangeRates()->GetCurrentExchangeRatesResult;

            // Convert XML response to an associative array
            $exchangeRates = (array)simplexml_load_string($response);

            // Prepare a variable to store the rates
            $rates = [];

            // Access the Day element from the exchange rates
            $dayData = $exchangeRates['Day'];

            // Loop through the Rate elements to get currency rates
            if (isset($dayData->Rate)) {
                foreach ($dayData->Rate as $rate) {
                    $currencyCode = (string)$rate['curr'];
                    $currencyValue = (string)$rate;

                    // Store in the rates array
                    $rates[$currencyCode] = $currencyValue;
                }
            }

            return view('exchange_rate', [
                'rates' => $rates,
                'date' => (string)$dayData->attributes()->date
            ]);
        } catch (\SoapFault $e) {
            // Handle the SOAP error
            return view('exchange_rate')->withErrors(['error' => 'Error fetching exchange rates: ' . $e->getMessage()]);
        }
    }




    public function getExchangeRateByDate(Request $request)
    {
        $request->validate([
            'currencyPair' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
        ]);

        try {
            // Create a new SOAP client
            $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");

            // Split the currency pair into individual currencies
            list($baseCurrency, $targetCurrency) = explode('-', $request->currencyPair);

            // Call the GetExchangeRates method with the given date and currency pair
            $response = $client->GetExchangeRates([
                'startDate' => $request->date,
                'endDate' => $request->date,
                'currencyNames' => "{$baseCurrency},{$targetCurrency}",
            ])->GetExchangeRatesResult;

            // Convert XML response to an associative array
            $exchangeRates = (array)simplexml_load_string($response);

            // Prepare a variable to store the rates
            $rates = [];
            $dayData = $exchangeRates['Day'] ?? null;

            if ($dayData) {
                foreach ($dayData->Rate as $rate) {
                    $currencyCode = (string)$rate['curr'];
                    $currencyValue = (string)$rate;

                    // Store in the rates array
                    $rates[$currencyCode] = $currencyValue;
                }
            }

            return view('exchange_rate', [
                'rates' => $rates,
                'date' => $request->date,
                'currencyPair' => $request->currencyPair
            ]);
        } catch (\SoapFault $e) {
            return view('exchange_rate')->withErrors(['error' => 'Error fetching exchange rates: ' . $e->getMessage()]);
        }
    }




    public function showMonthlyExchangeRate(Request $request)
    {
        // Validate input
        $request->validate([
            'currencyPair' => 'required|string',
            'month' => 'required|date_format:Y-m',
        ]);

        try {
            // Create a new SOAP client
            $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");

            // Split the currency pair into individual currencies
            list($baseCurrency, $targetCurrency) = explode('-', $request->currencyPair);

            // Calculate the start and end date of the month
            $startDate = $request->month . '-01';
            $endDate = date("Y-m-t", strtotime($startDate));  // Get the last day of the month

            // Call the GetExchangeRates method with the given date range and currency pair
            $response = $client->GetExchangeRates([
                'startDate' => $startDate,
                'endDate' => $endDate,
                'currencyNames' => "{$baseCurrency},{$targetCurrency}",
            ])->GetExchangeRatesResult;

            // Convert XML response to an associative array
            $exchangeRates = simplexml_load_string($response);

            // Prepare an array to store rates for the chart
            $rates = [];
            $dates = [];

            foreach ($exchangeRates->Day as $day) {
                $date = (string) $day['date'];
                $rates[] = [
                    'date' => $date,
                    'rate' => (float) $day->Rate,
                ];
                $dates[] = $date;
            }

            return view('monthly_exchange_rate', [
                'rates' => $rates,
                'dates' => $dates,
                'currencyPair' => $request->currencyPair,
                'startDate' => $startDate,  // Add startDate to the view
            ]);
        } catch (\SoapFault $e) {
            return view('monthly_exchange_rate')->withErrors(['error' => 'Error fetching exchange rates: ' . $e->getMessage()]);
        }
    }

}
