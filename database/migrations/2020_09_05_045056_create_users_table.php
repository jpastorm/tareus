<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_users');
            $table->unsignedBigInteger('id_rolusers')->index();
            $table->string('username');
            $table->string('password');
            $table->integer('reputation')->default(0);
            $table->string('email')->unique();
            $table->boolean('state')->default(true);
            $table->boolean('email_verified')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();

            //foreign key
            $table->foreign('id_rolusers')
                ->references('id_rolusers')
                ->on('rolusers')
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
        Schema::dropIfExists('users');
    }
}
