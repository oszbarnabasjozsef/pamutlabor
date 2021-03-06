<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('projects', function (Blueprint $table) {
          $table->id();
          $table->string('title',150);
          $table->mediumText('description');
          $table->bigInteger('owner_id')->unsigned();
          $table->bigInteger('status_id')->unsigned();
          $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
          $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
