<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodTypes extends Model
{
    use HasFactory;

    protected $table = "blood_types";

    protected $guarded = [];
}
