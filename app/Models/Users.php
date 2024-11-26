<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
//Authenticatable class for Auth purpose
class Users extends Authenticatable
{
    use HasFactory;
    protected $table ="table_users";
    public $timestamps = false;
    protected $fillable = ['name','email','password','type'];

}
