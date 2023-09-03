<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id', 'id');
    }
}
