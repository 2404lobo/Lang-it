<?php

namespace App\Http\Controllers;

use App\Models\Translations;
use Illuminate\Http\Request;

class TranslationsController extends Controller
{
    public function index(){
        $translations = Translations::get();
        return view('admin.translations.index', compact('translations'));
    }
    public function new(){
        return view('admin.translations.new');
    }
    public function store(Request $request){
        Translations::create($request->all());
        return "ok";
    }
}
