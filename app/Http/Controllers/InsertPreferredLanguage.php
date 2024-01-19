<?php

namespace App\Http\Controllers;

use App\Models\languages;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class InsertPreferredLanguage extends Controller
{
  public function preferredLanguage(Request $request)
  {
      try {
          $validator = Validator::make($request->all(), [
              'language' => 'required',
          ]);
  
          if ($validator->fails()) {
              return response()->json(['error' => 'Invalid input.'], 422);
          }
  
          $language = $request->input('language');
  
          $lang = new languages();
          $lang->language = $language;
          $lang->save();
  
          return response()->json(['message' => 'Language saved successfully.', 'data' => $lang]);
      } catch (\Exception $e) {
          return response()->json(['error' => 'Unable to save language.'], 500);
      }
  }
  
}
