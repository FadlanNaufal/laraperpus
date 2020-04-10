<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $fillable = ['ebook_name','ebook_file','ebook_status'];
}
