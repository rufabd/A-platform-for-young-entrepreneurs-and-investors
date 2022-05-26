<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('founder_id')->references('id')->on('founder_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('hiring_tag_id')->references('id')->on('project_post_hiring_tags')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('industry_tag_id')->references('id')->on('project_post_industry_tags')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->text('organization_description');
            $table->text('post_description');
            $table->string('country');
            $table->string('city');
            $table->string('organization');
            $table->string('organization_year');
            $table->string('project_stage');
            $table->integer('hours_per_week');
            $table->string('type_week');
            $table->string('investment');
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
        Schema::dropIfExists('project_posts');
    }
}
