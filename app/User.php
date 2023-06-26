<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name', 'email', 'password','phone', 'country_code', 'expertise_reg', 'why_advisor', 'company', 'country', 'profile_photo', 'profile_headline', 'biography', 'expertise', 'seniority', 'industry', 'business_model', 'price_20', 'price_40', 'price_60', 'available_slots', 'account_details', 'marketing_and_news', 'terms_and_conditions', 'user_id', 'role', 'bank_holder_name', 'ifc_code', 'account_no', 'swift_code', 'status','random_list', 'iban_number', 'bank_country','bic','timezone', 'available_slots_tempory', 'city'
    ];




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
