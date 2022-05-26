<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class CreateFounderProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('founder_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('founder_name');
            $table->string('founder_surname');
            $table->string('founder_position');
            $table->string('founder_organization');
            $table->string('founder_telephone');
            $table->string('founder_insta_link')->nullable();
            $table->string('founder_face_link')->nullable();
            $table->string('founder_linked_link')->nullable();
            $table->longText('founder_description')->nullable();
            // $table->string('founder_avatar')->default('default.jpg');
            $table->string('founder_avatar');
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
        Schema::dropIfExists('founder_profiles');
    }
}
