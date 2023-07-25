<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionnaireFilledAttendeeReferensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendee_referens', function (Blueprint $table) {
            $table->string('questionnaire_filled')->after('relationship')->default('NO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendee_referens', function (Blueprint $table) {
            $table->string('questionnaire_filled')->after('relationship')->default('NO');
        });
    }
}
