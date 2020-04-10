<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = ['borrow_date','return_date','returned_on','borrow_status','user_id','reader_id'];

    public function detail_borrow()
    {
        return $this->hasMany('App\BorrowDetail','borrow_id','id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function reader()
    {
        return $this->hasOne('App\Reader','id','reader_id');
    }
}
