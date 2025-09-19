<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'sub_sub_category_name_en',
        'sub_sub_category_name_hin',
        'sub_sub_category_slug_en',
        'sub_sub_category_slug_hin',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    } //end method

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    } //end method
}
