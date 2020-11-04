<?php

namespace App\Models\Interactive;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    // A task belongs to a brand
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
