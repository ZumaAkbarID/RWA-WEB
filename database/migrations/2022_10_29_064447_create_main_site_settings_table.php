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
        Schema::create('main_site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('main_image');
            $table->string('main_title');
            $table->text('main_desc');
            $table->text('about_desc');
            $table->integer('about_experience_since');
            $table->integer('about_happy_client');
            $table->integer('about_customer_review');
            $table->text('about_skill');
            $table->string('social_fb');
            $table->string('social_tw');
            $table->string('social_ig');
            $table->string('social_gh');
            $table->string('social_in');
            $table->string('download_cv');
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
        Schema::dropIfExists('main_site_settings');
    }
};