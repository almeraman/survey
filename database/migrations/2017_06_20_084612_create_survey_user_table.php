<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('survey_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('complete')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        DB::unprepared('CREATE TRIGGER `update_balance` AFTER UPDATE ON `survey_user`
        FOR EACH ROW IF new.complete > 0 THEN BEGIN
        DECLARE val float DEFAULT 0.00;
        DECLARE bal float DEFAULT 0.00;
        DECLARE total float DEFAULT 0.00;

        SELECT `value` FROM surveys WHERE id = new.survey_id INTO val;
        SELECT balance FROM users WHERE id = new.user_id INTO bal;
        SET total = bal + val;
        UPDATE users set balance = total WHERE id = new.user_id;
        END;
        END IF');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_user');
    }
}
