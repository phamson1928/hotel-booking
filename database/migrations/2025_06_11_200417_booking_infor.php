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
        Schema::create("booking_infor", function (Blueprint $table) {
            $table->id();
            $table->string('room_id');
            $table->string('full_name');
            $table->string('email_address');
            $table->string('phone_number');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_infor');
    }
};
