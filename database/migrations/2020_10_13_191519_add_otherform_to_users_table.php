<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherformToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->after('id');
            $table->tinyInteger('age')->after('name');
            $table->boolean('gender')->after('age');
            $table->string('address', 300)->after('gender');
            $table->string('phone')->after('address');
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
            $table->dropColumn('user_id');
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('phone');
        });
    }
}
