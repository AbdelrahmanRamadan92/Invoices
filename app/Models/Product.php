<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'description',
        'product_name',
        'created_by',

    ];

    public function section() //الاسم ده لازم اكتبه كدة section لو مكتبتهوش هيديلي خطأ
    {
            return $this->belongsTo('App\Models\Section');
    }
    
}
