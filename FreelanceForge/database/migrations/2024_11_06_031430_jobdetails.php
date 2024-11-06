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
        Schema::create('job_data', function (Blueprint $table) {
            $table->id(); 
            $table->string('jobdatano')->unique(); 
            $table->string('accountno');
            $table->string('certification')->nullable(); 
            $table->string('resume')->nullable();
            $table->timestamps(); 
        });

        Schema::create('job_details', function (Blueprint $table) {
            $table->id(); 
            $table->string('JobNo')->unique();
            $table->string('Title');
            $table->text('description');
            $table->decimal('per_hour_salary', 8, 2); 
            $table->integer('duration_project');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_data');
        Schema::dropIfExists('job_details');
    }
};
