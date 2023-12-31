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
        Schema::table('nearby_attractions', function (Blueprint $table) {
            $table->tinyInteger('order')->after('distance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nearby_attractions', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
