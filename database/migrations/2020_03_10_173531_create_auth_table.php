<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //建表
        Schema::create('auth',function(Blueprint $table){
            $table -> increments('id');
            $table -> string('auth_name',20) -> notNull();
            $table -> string('controller',40) ->nullable();
            $table -> string('action',30) -> nullable();
            $table -> tinyInteger('pid');
            $table -> enum('is_nav',[1,2]) -> notNull() ->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //delete table
        Schema::dropIfExists('auth');
    }
}
