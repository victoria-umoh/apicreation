<?php

namespace App\Http\Controllers;

use App\Models\Languages;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                    foreach ($country['languages'] as $languageCode => $languageName) {
                        $languages[$languageCode] = $languageName;
                    }
                }
            }

            return response()->json(['languages' => $languages], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch languages.'], 500);
        }
    }

    public function setLanguage(Request $request)
    {

        //'language' => 'required|exists:languages,language_code', enforce language from the select menu
        try {
            $validator = Validator::make($request->all(), [
                'language' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => 'Invalid input.'], 422);
            }
                 // Retrieve 'language' input
            $language = $request->input('language');

            //  'languages' is the model representing  languages table
            $lang = new Languages();
            $lang->language_code = $language;
            $lang->save();

            return response()->json(['message' => 'Language saved successfully.', 'data' => $lang]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to save language.'], 500);
        }
    }
}
