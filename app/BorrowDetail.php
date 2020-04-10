<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowDetail extends Model
{
    protected $fillable = ['book_id','borrow_id','total','status'];

    public function borrow()
    {
        return $this->belongsTo('App\Borrow','borrow_id','id');
    }

    public function book()
    {
        return $this->hasOne('App\Book','id','book_id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','id');
    }
}
