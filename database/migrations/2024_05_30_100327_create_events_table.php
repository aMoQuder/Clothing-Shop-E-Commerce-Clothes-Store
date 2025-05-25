<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_img');
            $table->string('title');
            $table->string('description',2000);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
