<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LMProfileMaster extends Model
{
    protected $fillable = [ 'LM_PM_FIRST_NAME', 'LM_PM_LAST_NAME', 'LM_PM_EMAIL', 'LM_PM_MOBILE', 'LM_PM_GENDER', 'LM_PM_CITY', 'LM_PM_STATE', 'LM_PM_COUNTRY', 'LM_PM_CITYCODE'];
    
    protected $table = "LMProfileMaster" ;

    public $timestamps = false;

    public $primarykey = 'LM_PM_PROFILE_ID';

    public $incrementing = false;

}
