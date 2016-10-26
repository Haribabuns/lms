<?php

namespace App\LM\Transformers;

class LessonTransformer extends Transformer {
	public function transform($profile)
        {
            return [
                    'Profile ID' => $profile['LM_PM_PROFILE_ID'],
                    'First Name' => $profile['LM_PM_FIRST_NAME'],
                    'Last Name' => $profile['LM_PM_LAST_NAME'],
                    'Email' => $profile['LM_PM_EMAIL'],
                    'Mobile' => $profile['LM_PM_MOBILE'],
                    'Created by' => $profile['LM_PM_CREATED_BY'],
                    'Created Date' => $profile['LM_PM_CREATED_DATE'],
                    'Updated by' => $profile['LM_PM_UPDATED_BY'],
                    'Updated Date' => $profile['LM_PM_UPDATED_DATE'],
                    'Date Of Birth' => $profile['LM_PM_DOB'],
                    'Gender' => $profile['LM_PM_GENDER'],
                    'Profile Picture' => $profile['LM_PM_PIC'],
                    'City' => $profile['LM_PM_CITY'],
                    'State' => $profile['LM_PM_STATE'],
                    'Country' => $profile['LM_PM_COUNTRY'],
                    'City Code' => $profile['LM_PM_CITYCODE']
                ];
        }
}