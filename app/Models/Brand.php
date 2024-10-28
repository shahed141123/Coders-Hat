<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory, HasSlug;

    protected $slugSourceColumn = 'name';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
    public function deals()
    {
        return $this->hasMany(DealBanner::class, 'brand_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
