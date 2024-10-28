<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasSlug;

    protected $slugSourceColumn = 'name';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function deals()
    {
        return $this->hasMany(DealBanner::class, 'brand_id');
    }
    public function products()
    {
        // return Product::whereJsonContains('category_id', (string) $this->id);
        return Product::whereJsonContains('category_id', json_encode($this->id));
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
