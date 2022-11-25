<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_task', function (Blueprint $table) {
            $table->increments('list_id', 8);
            $table->string('list_user_id', 100);
            $table->foreign('list_user_id')->references('user_id')->on('users');
            $table->foreign('list_task_id')->references('task_id')->on('task');
            $table->string('task_status',1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_task');
    }
};
