<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeImgUrlLengthItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    if (Schema::hasColumn('items', 'img_url')) {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('img_url');
        });
    }

    Schema::table('items', function (Blueprint $table) {
        $table->string('img_url', 255)->after('name');
    });
}

public function down()
{
    if (Schema::hasColumn('items', 'img_url')) {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('img_url');
        });
    }

    Schema::table('items', function (Blueprint $table) {
        $table->string('img_url', 100)->after('name');
    });
}



}