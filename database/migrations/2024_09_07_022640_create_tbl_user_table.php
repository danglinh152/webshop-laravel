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
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_email');
            $table->string('user_password');
            $table->string('user_first_name');
            $table->string('user_last_name');
            $table->string('user_address')->nullable();
            $table->string('user_phone')->nullable();
            $table->longText('user_image')->nullable();
            $table->enum('role', ['customer', 'admin']);
            $table->timestamps();
        });

        DB::table('tbl_user')->insert([
            ['user_email' => 'admin@gmail.com', 'user_password' => md5('admin'), 'user_first_name' => 'Mua Dong', 'user_last_name' => 'Khong Lanh', 'role' => 'admin'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_user');
    }
};
