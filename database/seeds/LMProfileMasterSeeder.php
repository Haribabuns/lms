<?php
use App\LMProfileMaster;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LMProfileMasterSeeder extends Seeder {

	public function run(){
		$faker = Faker::create();
		foreach(range(1, 30) as $index){
			LMProfileMaster::create([
				'LM_PM_PROFILE_ID' => $faker->numerify('LM############'),
				'LM_PM_FIRST_NAME' => $faker->firstName($gender = null|'male'|'female'),
				'LM_PM_LAST_NAME' => $faker->lastName,
				'LM_PM_EMAIL' => $faker->email,
				'LM_PM_MOBILE' => $faker->phoneNumber,
				'LM_PM_CREATED_BY' => $faker->firstName($gender = null|'male'|'female'),
				'LM_PM_CREATED_DATE' => $faker->date($format = 'Y-m-d', $max = 'now'),
				'LM_PM_UPDATED_BY' => $faker->firstName($gender = null|'male'|'female'),
				'LM_PM_UPDATED_DATE' => $faker->date($format = 'Y-m-d', $max = 'now'),
				'LM_PM_DOB' => $faker->date($format = 'Y-m-d', $max = 'now'),
				'LM_PM_GENDER' => $faker->randomLetter,
				'LM_PM_PIC' => $faker->imageUrl($width = 640, $height = 480),
				'LM_PM_CITY' => $faker->city,
				'LM_PM_STATE' => $faker->state,
				'LM_PM_COUNTRY' => $faker->country,
				'LM_PM_CITYCODE' => $faker->postcode

				]);
		}
	}

}