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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('m_name')->nullable();
            $table->string('l_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->string('mobile');
            $table->enum('gender', ['male', 'female', 'other', 'prefer not to say'])->nullable();
            $table->integer('age')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('nationality')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('profile_photo_name')->nullable();
            $table->string('occupation')->nullable();
            $table->string('company_name')->nullable();
            $table->string('education_level')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('preffered_language')->nullable();
            $table->string('religion')->nullable();
            $table->string('interests')->nullable();
            $table->string('preffered_communication_method')->nullable();
            $table->string('password')->nullable();
            $table->string('access_token')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('created_ip_address')->nullable();
            $table->string('modified_ip_address')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('modified_by')->nullable();
            $table->enum('status', ['active', 'delete', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
