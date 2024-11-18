<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //Here CasCade is used to delete the referenced brands is deleted
    public function up(): void
    {
        Schema::create('table_categories', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_name');
            $table->foreignId('brand_id')->constrained('table_brands')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_categories');
    }
};
