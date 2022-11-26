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
            $table->increments('list_id')->length(8);
            $table->integer('list_user_id')->length(8);
            $table->integer('list_task_id')->length(8);
            $table->integer('list_task_status')->default(0)->length(1);
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
