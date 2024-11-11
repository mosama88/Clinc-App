<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Currency;
class CalcNetSalary extends Model
{
    use HasFactory;
    protected $table='calc_net_salaries';
    protected $guarded=[];


    public function currency(){
        return  $this->belongsTo(Currency::class,'currency_id');
    }
}
