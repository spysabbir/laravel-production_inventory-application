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
        Schema::create('master_styles', function (Blueprint $table) {
            $table->id();
            $table->integer('unique_id')->unique();
            $table->integer('buyer_id');
            $table->integer('style_id');
            $table->integer('season_id');
            $table->integer('color_id');
            $table->integer('wash_id');
            $table->integer('garment_type_id');
            $table->enum('status', ['Inactive', 'Running', 'Hold', 'Close', 'Cancel'])->default('Inactive');
            $table->date('status_change_date')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_styles');
    }
};
