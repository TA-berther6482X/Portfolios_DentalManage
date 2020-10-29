<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRevervationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservation_models', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->after('id');
            $table->string('your_name', 20)->after('user_id');
            $table->string('email', 255)->after('your_name');
            $table->date('date')->after('email');
            $table->tinyInteger('time_category')->after('date');
            $table->string('status')->after('time_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservation_models', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('your_name');
            $table->dropColumn('email');
            $table->dropColumn('date');
            $table->dropColumn('time_category');
            $table->dropColumn('status');
        });
    }
}
