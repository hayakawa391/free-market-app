<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->string('status');
            $table->string('category');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_sold')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'brand',
                'description',
                'status',
                'category',
                'user_id',
                'is_sold',
            ]);
        });
    }
}
