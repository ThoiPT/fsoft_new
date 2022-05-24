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
        Schema::create('recruits', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('exp');
            $table->string('level');
            $table->integer('numRecruit');
            $table->datetime('open_at');
            $table->datetime('close_at');
            $table->string('description');
            $table->string('status')->default(1);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('vacancy_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('vacancy_id')->references('id')->on('vacancies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('recruits');
    }
};
