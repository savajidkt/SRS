<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToQuestionnaireAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_answers', function (Blueprint $table) {
            $table->integer('type')->after('answer')->comment('0 - self ,1 - reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire_answers', function (Blueprint $table) {
            $table->integer('type')->after('answer')->comment('0 - self ,1 - reference');
        });
    }
}
