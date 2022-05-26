<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkilledProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skilled_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('skilled_name');
            $table->string('skilled_surname');
            $table->string('skilled_profession');
            $table->string('skilled_industry');
            $table->string('skilled_telephone');
            $table->text('skilled_description');
            $table->string('skilled_experience_organization');
            $table->string('skilled_experience_position');
            $table->string('skilled_experience_from');
            $table->string('skilled_experience_till');
            $table->text('skilled_experience_description');
            $table->string('skilled_CV');
            $table->string('skilled_avatar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skilled_profiles');
    }
}
