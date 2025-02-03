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
            $table->id();
            $table->string('name');
            $table->boolean('gender');
            $table->boolean('type')->default(0);
            $table->string('email')->unique();
            $table->string('verification_code', 6)->nullable(); // 6 haneli kod
            $table->timestamp('email_verified_at')->nullable(); // Doğrulama zamanı
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        $users = [
            ['id' => 1, 'name' => 'Male Admin', 'gender' => 1, 'type' => 1, 'email' => 'male@admin.com', 'email_verified_at' => now(), 'password' => bcrypt('maleadmin')],
            ['id' => 2, 'name' => 'Female Admin', 'gender' => 0, 'type' => 1, 'email' => 'female@admin.com', 'email_verified_at' => now(), 'password' => bcrypt('femaleadmin')],
        ];
        DB::table('users')->insert($users);

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
