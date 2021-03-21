<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['autor_id','category_id','source_id'];

    public function category()
    {
      return $this->belongsTo(Category::class)->first()->category;
    }

    public function source()
    {
      return $this->belongsTo(SourceOfNews::class,'source_id')->first()->source;
    }

    public function autor()
    {
      return $this->belongsTo(User::class,'autor_id')->first()->name;
    }

}
