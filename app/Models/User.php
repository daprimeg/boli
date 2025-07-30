<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;  // Ensure this is included
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable  // This should extend Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'companyName',
        'companyAddress1',
        'companyAddress2',
        'townCity',
        'country',
        'postcode',
        'telephone',
        'businessType',
        'companyReg',
        'website',
        'businessEmail',
        'motorTradeInsurance',
        'vatNumber',
        'firstName',
        'surname',
        'title',
        'jobTitle',
        'phone',
        'personalEmail',
        'password',
        'uploadID',
        'motorTradeProof',
        'addressProof',
        'avatar',
    ];

    protected $hidden = [
        'password',
    ];

    public function pinnedNews()
    {
    return $this->belongsToMany(News::class, 'news_user_pins')->withTimestamps();
    }

    public function intrest()
    {
     return $this->hasMany(Interest::class,'user_id');
    }
}
