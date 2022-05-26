<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('investor_name');
            $table->string('investor_surname');
            $table->foreignId('industry_tag_id')->references('id')->on('project_post_industry_tags')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('investor_description');
            $table->string('investor_insta_link')->nullable();
            $table->string('investor_face_link')->nullable();
            $table->string('investor_linked_link')->nullable();
            $table->string('investor_avatar');
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
        Schema::dropIfExists('investor_profiles');
    }
}
