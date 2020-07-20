<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected  $fillable = ['account_number','transaction_type','amount','balance','user_id'];


    public  function user(){
        return $this->hasOne('App\User');
    }
    public  function comptability(){
        return $this->belongsTo('App\Comptability');
    }
}
