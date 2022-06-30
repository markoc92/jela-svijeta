<?php

// CategoryFilter.php

namespace App\Http\Filters;

class CategoryFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('category_id', $value);
    }
}
