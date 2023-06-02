<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->tinyInteger('user_type')->after('password')->default(2)->comment('1=Admin, 2=User');
            $table->tinyInteger('user_status')->after('user_type')->default(0)->comment('0=Inactive, 1=Active');
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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('address');
            $table->dropColumn('user_type');
            $table->dropColumn('user_status');
            $table->dropColumn('is_first_time_login');
            $table->string('name')->after('id');
            $table->dropColumn('deleted_at');
        });
    }
}
