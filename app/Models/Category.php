<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //use SoftDeletes;
	
    protected $table = "category";

    public $timestamps = false;
}
