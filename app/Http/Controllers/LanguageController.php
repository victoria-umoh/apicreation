<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class LanguageController extends Controller
{
    public function getLanguages()
    {
        $client = new Client();

        try {
            $response = $client->get('https://restcountries.com/v3.1/all');
            $data = json_decode($response->getBody(), true);

            $languages = [];

            foreach ($data as $country) {
                if (isset($country['languages'])) {
                    $languages = array_merge($languages, array_keys($country['languages']));
                }
            }

            $uniqueLanguages = array_unique($languages);
                return response()->json(['languages' => array_values($uniqueLanguages)], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch languages.'], 500);
        }
    }
}
