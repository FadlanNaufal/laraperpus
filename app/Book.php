<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['book_code','book_name','book_desc','book_pict','book_stock'];
}
