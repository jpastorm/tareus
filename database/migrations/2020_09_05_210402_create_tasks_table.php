<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id_tasks');
            $table->unsignedBigInteger('id_users')->index();
            $table->unsignedBigInteger('id_courses')->index();
            $table->string('name');
            $table->text('description');
            $table->text('img')->nullable();
            $table->text('file');
            $table->timestamps();

            //foreign key users
            $table->foreign('id_users')
                ->references('id_users')
                ->on('users')
                ->onDelete('cascade');
            //foreign key courses
            $table->foreign('id_courses')
                ->references('id_courses')
                ->on('courses')
                ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
