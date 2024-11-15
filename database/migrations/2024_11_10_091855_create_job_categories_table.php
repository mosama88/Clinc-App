<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });

        DB::table('job_categories')->insert([
            [
                'name' => 'محاسب',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'محامى',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'IT',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'HR',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);



        DB::table('job_categories')->insert([
            [
                'name' => 'المبيعات',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'المشتريات',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('job_categories')->insert([
            [
                'name' => 'مدير مالى',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('job_categories')->insert([
            [
                'name' => 'مهندس شبكات',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);



        DB::table('job_categories')->insert([
            [
                'name' => 'مهندس تطوير الويب',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);



        DB::table('job_categories')->insert([
            [
                'name' => 'مصمم جرافيك',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_categories');
    }
};