<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessageStatusToCompanyOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_organizers', function (Blueprint $table) {
            $table->integer('message_status')->after('confirm_attendee');
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
            $table->integer('message_status')->after('confirm_attendee');
        });
    }
}
