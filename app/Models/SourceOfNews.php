<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceOfNews extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['is_actual','updated_at'];
}
