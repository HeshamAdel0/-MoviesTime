<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('website_name')->nullable();
            $table->string('website_email')->nullable();
            $table->text('website_adress')->nullable();
            $table->text('website_description')->nullable();
            $table->string('website_logo')->default('website-logo.png');
            $table->text('website_facebook')->nullable();
            $table->text('website_twitter')->nullable();
            $table->text('website_instagram')->nullable();
            $table->text('website_youtube')->nullable();
            $table->text('website_pinterest')->nullable();
            $table->text('website_github')->nullable();
            $table->text('website_linkedin')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
