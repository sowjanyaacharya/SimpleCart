<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ="table_categories";
    protected $primarykey = "cat_id";
    protected $fillable = ['cat_name','brand_id'];
    use HasFactory;
    
    //each category should have one brand
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id', 'id');
    }
}
