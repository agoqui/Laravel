<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRoomsFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('rooms', function(Blueprint $table){
            $table->integer('movies_id')->unsigned()->nullable();
            $table->foreign('movies_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('rooms', function(Blueprint $table){
            $table->dropForeign('movies_id');
            $table->dropColumn('movies_id');
        });
    }
}
