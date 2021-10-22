<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Backend\Supports\Constant;
use Modules\Backend\Supports\DefaultValue;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('mobile')->nullable();
            $table->string('password');
            $table->boolean('force_pass_reset')->default(false);
            $table->string('remarks')->nullable();
            $table->enum('enabled', array_keys(Constant::ENABLED_OPTIONS))->default(DefaultValue::ENABLED_OPTION)->nullable();
            $table->rememberToken();
            $table->foreignId('created_by')->index()->nullable();
            $table->foreignId('updated_by')->index()->nullable();
            $table->foreignId('deleted_by')->index()->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();

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
