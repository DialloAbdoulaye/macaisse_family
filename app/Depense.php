<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable = ['title','montant','user_id'];

    public function user(){
        return $this->belongsTo('app\User');
    }
    public $timestamps=false;
}
