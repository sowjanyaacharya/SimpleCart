<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Brand extends Model
{
    protected $table ="table_brands";
    protected $primarykey = "id";
    protected $fillable = ['brandname'];
    use HasFactory;
    
    //relatn btw cat and brand 
    public function categories(){
        return $this->hasMany(Category::class,'brand_id', 'id');
    }
}
