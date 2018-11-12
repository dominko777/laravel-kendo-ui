<?php

namespace App\Http\Controllers;

use App\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TranslationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('translation.index');
    }

    public function list()
    {
        return Translation::all()->toJson();
    }

    public function create(Request $request)
    {
        $newTranslations = json_decode($request->input('models'));
        foreach ($newTranslations as $newTranslation)
        {
            $model = new Translation();
            $model->translation_id = $newTranslation->translation_id;
            $model->description = $newTranslation->description;
            $model->label_id = $newTranslation->label_id;
            $model->text = $newTranslation->text;
            $model->language_id = $newTranslation->language_id;
            $model->save();
        }
    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }
}
