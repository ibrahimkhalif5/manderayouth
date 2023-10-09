<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idno');
            $table->date('dob');
            $table->string('gender');
            $table->integer('mobile')->unique();
            $table->string('passport');
            $table->string('passport_no')->nullable();
            $table->date('passport_date')->nullable();
            $table->string('pwd');
            $table->string('parent_name');
            $table->integer('parent_contact');
            $table->string('subcounty');
            $table->string('ward');
            $table->string('are_you_intrested_in');
            $table->string('education')->nullable();
            $table->string('qualification');
            $table->string('grade');
            $table->string('year_of_experience');
            $table->string('position')->nullable();
            $table->longText('duties_responsibilities')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
