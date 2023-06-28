<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_attendees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('organizer_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('job_title');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('organizer_id')->references('id')->on('company_organizers')->onDelete('cascade');
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
        Schema::dropIfExists('course_attendees');
    }
}
