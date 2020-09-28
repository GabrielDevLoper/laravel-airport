<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnInTableReservess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('reservess')) {
            if (Schema::hasColumn('reservess', 'date_reserved')) {
                Schema::table('reservess', function (Blueprint $table) {
                    $table->renameColumn('date_reserved', 'date_reserveds');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('reservess')) {
            if (Schema::hasColumn('reservess', 'date_reserved')) {
                Schema::table('reservess', function (Blueprint $table) {
                    $table->renameColumn('date_reserveds', 'date_reserved');
                });
            }
        }
    }
}
