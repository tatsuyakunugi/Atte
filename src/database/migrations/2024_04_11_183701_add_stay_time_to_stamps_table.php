<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStayTimeToStampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stamps', function (Blueprint $table) {
            $table->float('stayTime')->nullable()->after('punchOut');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stamps', function (Blueprint $table) {
            $table->dropColumn('stayTime');
        });
    }
}
