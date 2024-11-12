<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminPanel extends Model
{
    use HasFactory;

    protected $table = "admin_panels";

    protected $guarded = [];


    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }


    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }


    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    
}