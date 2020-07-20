<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comptability extends Model
{
    protected $fillable = ['transaction_amount','type_transaction','account_id','is_possible'];

    public function accounts(){
        return $this->hasMany('App\Account');
    }
}
