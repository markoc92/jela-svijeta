<?php

namespace App\Models;

use Carbon\Carbon;
use App\Http\Filters\MealFilter;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Meal extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['title', 'description'];
    protected $fillable = ['category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'meal_tag');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'meal_ingredient');
    }
}
