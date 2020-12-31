<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEloquentActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eloquent_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('system_logable_id');
            $table->string('system_logable_type');
            $table->bigInteger('user_id')->nullable();
            $table->string('guard_name');
            $table->string('module_name');
            $table->string('action');
            $table->json('old_value')->nullable();
            $table->json('new_value')->nullable();
            $table->string('ip_address');
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
        Schema::dropIfExists('eloquent_activities');
    }
}
