<?php
namespace App\Http\Controllers;
use App\Models\Translations;
use App\Models\Languages;
use App\Models\User;
use App\Http\Requests\StoreTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function redirect(){
        return redirect()->route('home');
    }
    public function index(){
        $translations=DB::table('translations')
                        ->join('users as ustr','translations.translatorid','=','ustr.id')
                        ->join('users as uscl','translations.requestedby','=','uscl.id')
                        ->leftjoin('languages as lang1','translations.originlanguage','=','lang1.id')
                        ->leftjoin('languages as lang2','translations.finallanguage','=','lang2.id')
                        ->where('translatorid',Auth::id())
                        ->select('translations.id as id',
                                 'translations.title as title',
                                 'translations.message',
                                 'lang1.shortname as lang1',
                                 'lang2.shortname as lang2',
                                 'translations.progress', 
                                 'translations.wordcount', 
                                 'translations.duedate',
                                 'ustr.id as translator',
                                 'uscl.name as requestedby')->get();
        $trans=Translations::all();
        $langs=Languages::all();
        return view('dashboard', compact('translations','langs'));
    }
    public function new(StoreTranslation $request){
        $translation=Translations::create($request->all());
        return redirect()->route('home');
    }
    public function edit($id){
        $translation=Translations::find($id);
        if(!$translation){
            return redirect()->route('home');
        }
        return $ModalEdit.modal('show');
    }
    public function apply(StoreTranslation $request,$id){
        $translation = Translations::find($id);
        if(!$translation){
            return redirect()->back();
        }
        $translation->update($request->all());
        return redirect()->route('home');
    }
}
