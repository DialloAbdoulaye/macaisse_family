<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_user extends Model
{
   protected $fillable =['user_id','transaction_id'];

   protected $table="user_transactions";
}
