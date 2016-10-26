<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LmProfileMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LmProfileMaster', function (Blueprint $table) {
            $table->string('LM_PM_PROFILE_ID', 100);
            $table->string('LM_PM_FIRST_NAME', 100);
            $table->string('LM_PM_LAST_NAME', 100);
            $table->string('LM_PM_EMAIL', 100);
            $table->string('LM_PM_MOBILE', 100);
            $table->string('LM_PM_CREATED_BY', 100);
            $table->date('LM_PM_CREATED_DATE');
            $table->string('LM_PM_UPDATED_BY', 100);
            $table->date('LM_PM_UPDATED_DATE');
            $table->date('LM_PM_DOB');
            $table->string('LM_PM_GENDER', 1);
            $table->string('LM_PM_PIC', 100);
            $table->string('LM_PM_CITY', 100);
            $table->string('LM_PM_STATE', 100);
            $table->string('LM_PM_COUNTRY', 100);
            $table->string('LM_PM_CITYCODE', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LmProfileMaster');
    }
}
