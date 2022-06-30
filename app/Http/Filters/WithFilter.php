<?php

// WithFilter.php

namespace App\Http\Filters;

class  WithFilter
{
    public function filter($builder, $value)
    {
        $keywords = explode(',', $value);

        foreach ($keywords as $keyword) {
            $builder = $builder->with($keyword);
        }

        return $builder;
    }
}
