<?php
namespace App\Http\Controllers;

use App\Models\County;
use App\Models\Population;
use App\Models\Town;
use Illuminate\Http\Request;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

class SoapController extends Controller
{
    public function handleSoapRequest(Request $request)
    {
        $xml = $request->getContent();

        // Load the XML string into a SimpleXMLElement
        $xmlObject = simplexml_load_string($xml);

        // Get the SOAP action from the request's body
        $action = $xmlObject->children('soapenv', true)->Body->children()->getName();

        // Determine the action and call the corresponding method
        switch ($action) {
            case 'getCounties':
                return response()->xml($this->getCounties());
            case 'getPopulationByTown':
                $townId = $xmlObject->Body->getPopulationByTown->townId;
                return response()->xml($this->getPopulationByTown($townId));
            case 'getTowns':
                return response()->xml($this->getTowns());
            // Add more cases here for other methods as needed
            default:
                return response()->xml(['error' => 'Invalid action'], 400);
        }
    }

    public function getCounties()
    {
        return County::with('towns')->get(); // Retrieve counties with related towns
    }

    public function getTowns()
    {
        return Town::all(); // Retrieve all towns
    }

    public function getPopulationByTown($townId)
    {
        return Town::with('populations')->find($townId); // Retrieve town with related populations
    }

    public function getPopulations()
    {
        return Population::all();
    }

    // Other methods like getTownsByCounty, getCountyById, etc., can be defined here
}
