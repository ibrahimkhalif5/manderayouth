<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_9089043')->references('id')->on('users');
            $table->unsignedBigInteger('skills_training_id')->nullable();
            $table->foreign('skills_training_id', 'skills_training_fk_9090913')->references('id')->on('careers');
        });
    }
}
