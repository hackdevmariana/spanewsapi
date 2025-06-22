<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('url');
            $table->string('rss_url')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('type')->nullable(); // institutional, blog, media, etc.
            $table->string('geographic_scope')->nullable();
            $table->string('main_topic')->nullable();
            $table->string('logo')->nullable();
            //$table->foreignId('municipality_id')->nullable()->constrained();
            $table->unsignedBigInteger('municipality_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sources');
    }
};
