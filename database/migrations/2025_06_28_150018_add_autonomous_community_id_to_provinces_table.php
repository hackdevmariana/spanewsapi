<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('provinces', function (Blueprint $table) {
            $table->foreignId('autonomous_community_id')->constrained('autonomous_communities')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('provinces', function (Blueprint $table) {
            $table->dropForeign(['autonomous_community_id']);
            $table->dropColumn('autonomous_community_id');
        });
    }
};
