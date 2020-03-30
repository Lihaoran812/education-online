<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username',20)->notNull();
            $table->string('password')->notNull();
            $table->enum('gender',[1,2,3])->notNull()->default('1');
            $table->string('mobile',11);
            $table->string('email',50);
            $table->tinyInteger('role_id');
            $table->timestamps();
            $table->rememberToken();
            $table->enum('status',[1,2])->notNull()->default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager');
    }
}
