<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendeeReferensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendee_referens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('organizer_id');
            $table->unsignedBigInteger('attendees_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('relationship');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('organizer_id')->references('id')->on('company_organizers')->onDelete('cascade');
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
        Schema::dropIfExists('attendee_referens');
    }
}
