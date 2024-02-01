<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectUserLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('project_id');
            $table->unsignedTinyInteger('user_id');
            $table->timestamps();

            $table->index('project_id', 'pul_project_idx');
            $table->index('user_id', 'pul_user_idx');

            $table->foreign('project_id', 'pul_project_fk')->on('projects')->references('id');
            $table->foreign('user_id', 'pul_user_fk')->on('users')->references('id');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user_likes');
    }
}
