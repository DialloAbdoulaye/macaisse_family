<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Transaction extends Model
{
    protected $fillable = ['montant'];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}

