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
        Schema::create('admin_panels', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 250);
            $table->tinyInteger('system_status')->default('1')->comment('واحد مفعل - صفر معطل');
            $table->string('image', 250)->nullable();
            $table->string('photo_cover', 250)->nullable();
            $table->string('phons', 250);
            $table->string('address', 250);
            $table->string('email', 100);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_panels');
    }
};
