<?php

// LanguageFilter.php

namespace App\Http\Filters;

class  LanguageFilter
{
    public function filter($builder, $value)
    {
        $builder = app()->setLocale($value);
        return $builder;
    }
}
