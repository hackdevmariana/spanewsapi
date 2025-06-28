<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sources', function (Blueprint $table) {
            $table->dropColumn('contact_email');
            $table->string('editorial_email')->nullable()->after('rss_url');
            $table->string('commercial_email')->nullable()->after('editorial_email');

            $table->unsignedBigInteger('province_id')->nullable()->after('municipality_id');
            $table->foreign('province_id')
                  ->references('id')->on('provinces')
                  ->onDelete('set null');

            $table->unsignedBigInteger('community_id')->nullable()->after('province_id');
            $table->foreign('community_id')
                  ->references('id')->on('autonomous_communities')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('sources', function (Blueprint $table) {
            $table->dropForeign(['community_id']);
            $table->dropColumn('community_id');

            $table->dropForeign(['province_id']);
            $table->dropColumn('province_id');

            $table->dropColumn('commercial_email');
            $table->dropColumn('editorial_email');

            $table->string('contact_email')->nullable()->after('rss_url');
        });
    }
};
