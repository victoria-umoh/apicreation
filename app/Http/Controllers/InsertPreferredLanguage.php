<?php

namespace App\Http\Controllers;

use App\Models\languages;

use Illuminate\Http\Request;


class InsertPreferredLanguage extends Controller
{
    public function preferredLanguage(Request $request){
        // VALIDATE
        $validator = Validator::make($request->all(), [
            'language' => 'required'
        ]);

        $language = $request->input('language');

        $lang = new Language();
        $lang->language = $language;
        $lang->save();

    }
}
