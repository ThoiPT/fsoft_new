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
        Schema::create('recruit_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recruit_id');
            $table->unsignedBigInteger('skill_id');
            $table->timestamps();

            $table->foreign('recruit_id')->references('id')->on('recruits')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')
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
        Schema::dropIfExists('recruit_skills');
    }
};
