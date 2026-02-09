<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'parent_id',
        'is_active',
        'is_delete'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_delete' => 'boolean',
    ];

    /**
     * Quan hệ với danh mục cha
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Quan hệ với danh mục con
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('is_delete', 0);
    }

    /**
     * Lấy tất cả con cháu (recursive)
     */
    public function getAllDescendants()
    {
        $descendants = collect();
        
        // Load children với scope notDeleted
        $children = Category::notDeleted()->where('parent_id', $this->id)->get();
        
        foreach ($children as $child) {
            $descendants->push($child);
            $descendants = $descendants->merge($child->getAllDescendants());
        }
        
        return $descendants;
    }

    /**
     * Scope để lấy các category chưa bị xóa
     */
    public function scopeNotDeleted($query)
    {
        return $query->where('is_delete', 0);
    }

    /**
     * Scope để lấy các category đang active
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
