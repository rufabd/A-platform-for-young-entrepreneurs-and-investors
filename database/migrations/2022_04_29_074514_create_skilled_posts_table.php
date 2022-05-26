<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkilledPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skilled_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skilled_id')->references('id')->on('skilled_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('hiring_tag_id')->references('id')->on('project_post_hiring_tags')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('industry_tag_id')->references('id')->on('project_post_industry_tags')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->text('post_desciption');
            $table->string('country');
            $table->string('city');
            $table->integer('hours_per_week');
            $table->string('type');
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
        Schema::dropIfExists('skilled_posts');
    }
}
