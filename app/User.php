<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;
    protected  $fillable = ['firstname','lastname','phone','avatar','active','amande','matricule','montant-amande','type_user'];


    public function transactions(){
        return $this->belongsToMany('App\Transaction');
    }

    public function user(){
        return $this->hasMany('app\Depense');
    }


    public function account(){
        $this->belongsTo('app\Account');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
