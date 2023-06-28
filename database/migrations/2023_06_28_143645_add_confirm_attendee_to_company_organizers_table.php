<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfirmAttendeeToCompanyOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_organizers', function (Blueprint $table) {
            $table->integer('confirm_attendee')->after('email')->comment('0 - Not Confirm ,1 - Confirm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_organizers', function (Blueprint $table) {
            $table->integer('confirm_attendee')->after('email')->comment('0 - Not Confirm ,1 - Confirm');
        });
    }
}
