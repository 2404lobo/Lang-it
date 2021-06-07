<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreUpdatePost;
use App\Models\Translations;
use Illuminate\Http\Request;
class TranslationsController extends Controller
{
    public function index(){
        $translations=Translations::where('',)->orderby('title','DESC')->paginate(3);
        return view('admin.translations.index', compact('translations'));
    }
    public function new(){
        return view('admin.translations.new');
    }
    public function store(StoreUpdatePost $request){
        $translation=Translations::create($request->all());
        return redirect()->route('translations.index');
    }
    public function show($id){
        $translation = Translations::find($id);
        if(!$translation){
            return redirect()->route('translations.index');
        }
        return view('admin.translations.show',compact('translations'));
    }
    public function destroy($id){
        $translation = Translations::find($id);
        $translation->delete();
        return redirect()->route('translations.index');
    }
    public function edit($id){
        $translation = Translations::find($id);
        if(!$translation){
            return redirect()->route('translations.index');
        }
        return view('admin.translations.edit',compact('translations'));
    }
    public function update(StoreUpdatePost $request, $id){
        $translation = Translations::find($id);
        if(!$translation){
            return redirect()->back();
        }
        $translation->update($request->all());
        return redirect()->route('translations.index')->with('messsage','Alterado com sucesso');
    }
    public function search(Request $request){
        $filtro=$request->all();
        $translations=Translations::where('title','LIKE',"%{$request->filtro}%")
                                  ->orwhere('message','LIKE',"%{$request->filtro}%")
                                  ->orderby('title','DESC')
                                  ->paginate(3);
        return view('admin.translations.index', compact('translations','filtro'));
    }
}
