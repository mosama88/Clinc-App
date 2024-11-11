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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->integer('com_code');
            $table->timestamps();
        });

        DB::table('sections')->insert([
            [
                'name' => 'قسم الباطنه',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);


        DB::table('sections')->insert([
            [
                'name' => 'قسم جراحة مخ واعصاب',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('sections')->insert([
            [
                'name' => 'قسم الجراحه العامه',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('sections')->insert([
            [
                'name' => 'قسم الجهاز الهضمى',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('sections')->insert([
            [
                'name' => 'قسم الصدر',
                'com_code' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);

        DB::table('sections')->insert([
            [
                'name' => 'قسم الغدد الصماء',
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
        Schema::dropIfExists('sections');
    }
};