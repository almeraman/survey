<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanySurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_survey', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->integer('survey_id')->unsigned();
            $table->timestamp('created_at')->useCurrent();
        });

        DB::table('company_survey')->insert(
            array(
                'company_id' => 1,
                'survey_id' => 1,
            )
        );

        DB::table('company_survey')->insert(
            array(
                'company_id' => 2,
                'survey_id' => 2,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_survey');
    }
}
