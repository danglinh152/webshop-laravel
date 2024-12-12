<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_email');
            $table->string('user_password')->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('user_first_name');
            $table->string('user_last_name')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_phone')->nullable();
            $table->longText('user_image')->nullable();
            $table->enum('role', ['customer', 'admin'])->default('customer');
            $table->enum('ranking', ['COPPER', 'SILVER', 'GOLD', 'DIAMOND'])->default('COPPER');
            $table->integer('spending_score')->default(1);
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['user_email' => 'admin@gmail.com', 'user_password' => md5('admin'), 'user_first_name' => 'Ẹt', 'user_last_name' => 'Min', 'role' => 'admin'],
            ['user_email' => 'client@gmail.com', 'user_password' => md5('client'), 'user_first_name' => 'Du', 'user_last_name' => 'Xơ', 'role' => 'customer']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
