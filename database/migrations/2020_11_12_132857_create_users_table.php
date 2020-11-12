<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->comment('電子郵件');
            $table->string('password')->comment('密碼');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('name')->comment('姓名');
            $table->boolean('gender')->default(0)->comment('性別'); //1男 2女 0未知
            $table->string('tel')->nullable()->comment('電話');
            $table->string('address')->nullable()->comment('地址');
            $table->string('avatar',500)->nullable()->comment('頭像'); //頭像功能,可為空值
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
        Schema::dropIfExists('users');
    }
}
