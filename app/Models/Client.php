<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, HasSlug;

    protected $slugSourceColumn = 'name';

    protected $guarded = [];
    
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
