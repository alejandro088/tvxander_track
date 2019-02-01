<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = ['option_value','option_name','user_id'];
    public static function setLanguage($lang = 'en')
    {
        Setting::updateOrCreate(['option_name' => 'language',
            'user_id' => Auth::user()->id
        ],
        ['option_value' => $lang]     
        );
        
    }

    public static function setFilterAdult($adult = true)
    {
        if($adult == null) $adult = false;
        
        Setting::updateOrCreate(['option_name' => 'adult',
            'user_id' => Auth::user()->id
        ],
        ['option_value' => $adult]     
        );
    }
}
