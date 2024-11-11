<?php

use Carbon\Carbon;
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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('اسم العملة');
            $table->string('description')->comment('وصف العملة');
            $table->string('amount')->comment('قيمة العملة');
            $table->timestamps();
        });

        DB::table('currencies')->insert([
            [
                'id' => 3,
                'name' => '$',
                'description' => 'دولار أمريكى',
                'amount' => 49,
                'created_at' => Carbon::parse('2024-11-10 16:01:16'),
                'updated_at' => Carbon::parse('2024-11-10 16:01:16'),
            ],
            [
                'id' => 5,
                'name' => 'SAR',
                'description' => 'الريال السعودى',
                'amount' => 13.12,
                'created_at' => Carbon::parse('2024-11-10 16:41:46'),
                'updated_at' => Carbon::parse('2024-11-10 16:41:46'),
            ],
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};