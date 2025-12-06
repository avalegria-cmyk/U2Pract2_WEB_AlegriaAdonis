<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $avav_table) {
            $avav_table->id();
            $avav_table->string('title');
            $avav_table->text('description')->nullable();
            $avav_table->boolean('is_done')->default(false);
            $avav_table->date('due_date')->nullable();
            $avav_table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};