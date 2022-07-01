<?php

// CategoryFilter.php

namespace App\Http\Filters;

class CategoryFilter
{
    public function filter($builder, $value)
    {
        switch ($value) {
            case 'NULL':
                return $builder->whereNull('category_id');
            case '!NULL':
                return $builder->whereNotNull('category_id');
            default:
                return $builder->where('category_id', $value);
        }
    }
}
