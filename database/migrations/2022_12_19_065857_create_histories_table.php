<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip_address')->nullable();
            $table->foreignId('property_id')->constrained('properties');
            $table->foreignId('user_id')->constrained('users');
            $table->string('customer_wa')->nullable();
            $table->string('customer_name')->nullable();
            $table->enum('type', ['click', 'submit']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
};
