<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('user_id');
            $table->unsignedTinyInteger('project_id');
            $table->text('message');
            $table->timestamps();

            $table->index('project_id', 'comments_project_idx');
            $table->index('user_id', 'commets_user_idx');

            $table->foreign('project_id', 'comments_project_fk')->on('projects')->references('id');
            $table->foreign('user_id', 'commets_user_fk')->on('users')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
