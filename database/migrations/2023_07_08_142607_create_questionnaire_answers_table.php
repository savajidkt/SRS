<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnaireAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('attendees_id');
            $table->integer('question_id');
            $table->integer('answer')->comment('0 = NOT LIKE ME, 1 = QUITE LIKE ME, 2 = VERY LIKE ME');
            $table->timestamps();
            $table->foreign('contact_id')->references('id')->on('attendee_referens')->onDelete('cascade');
            $table->foreign('attendees_id')->references('id')->on('course_attendees')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaire_answers');
    }
}
