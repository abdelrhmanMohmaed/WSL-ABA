<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Setting extends Model
{
    protected $table = 'settings';

    protected $appends = [
        'about',
        'why_us',
        'customer_policy',
        'provider_policy',
        'address',
    ];

    public function getAboutAttribute()
    {
        if(App::isLocale('ar'))
        {
            return $this->about_ar;
        }elseif(App::isLocale('en'))
        {
            return $this->about_en;
        }else
        {
            return $this->about_ar;
        }
    }

    public function getWhyUsAttribute()
    {
        if(App::isLocale('ar'))
        {
            return $this->why_us_ar;
        }elseif(App::isLocale('en'))
        {
            return $this->why_us_en;
        }else
        {
            return $this->why_us_ar;
        }
    }

    public function getCustomerPolicyAttribute()
    {
        if(App::isLocale('ar'))
        {
            return $this->customer_policy_ar;
        }elseif(App::isLocale('en'))
        {
            return $this->customer_policy_en;
        }else
        {
            return $this->customer_policy_ar;
        }
    }


    public function getProviderPolicyAttribute()
    {
        if(App::isLocale('ar'))
        {
            return $this->provider_policy_ar;
        }elseif(App::isLocale('en'))
        {
            return $this->provider_policy_en;
        }else
        {
            return $this->provider_policy_ar;
        }
    }

    public function getAddressAttribute()
    {
        if(App::isLocale('ar'))
        {
            return $this->address_ar;
        }elseif(App::isLocale('en'))
        {
            return $this->address_en;
        }else
        {
            return $this->address_ar;
        }
    }

}
