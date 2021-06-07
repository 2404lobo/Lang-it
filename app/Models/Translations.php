<?php
namespace App\Models;
use App\Models\Languages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translations extends Model
{
    use HasFactory;
    protected $table = 'translations';
    protected $fillable = ['id','title','message','duedate','progress','wordcount','translatorid','requestedby','originlanguage','finallanguage','created_at','updated_at'];
}
