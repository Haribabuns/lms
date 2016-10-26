<?php
use App\LMProfileMaster;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	LMProfileMaster::truncate();
    	//DB::table('lmprofilemaster')->truncate();
        $this->call(LMProfileMasterSeeder::class);
    }
}
