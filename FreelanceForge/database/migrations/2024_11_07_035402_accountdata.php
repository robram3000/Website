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
        Schema::create('AccountDetailAuth', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('account_no')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role_type');
            $table->string('otp')->nullable(); // Optional One-Time Password (OTP) field
            $table->timestamp('otp_expires_at')->nullable(); // OTP expiration time
            $table->timestamps(); // Adds created_at and updated_at columns
        });
        Schema::create('AccountDetails', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('account_no')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->unsignedTinyInteger('age');
            $table->string('address');
            $table->string('phone_number');
            $table->date('birthday');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('AccountDetailsAuth');
        Schema::dropIfExists('AccountDetails');
    }
};
