<?php   
namespace App\Models;
use App\Models\Translations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    use HasFactory;
    protected $table = 'languages';
    protected $fillable = ['id','shortname','fullname'];
}
