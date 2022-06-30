<?php

// BaseMealCollectionFilter.php

namespace App\Http\Filters;

use App\Http\Filters\AbstractFilter;

class BaseMealCollectionFilter extends AbstractFilter
{
    protected $filters = [
        'category' => CategoryFilter::class,
        'lang' => LanguageFilter::class,
        'tags' => TagFilter::class,
        'with' => WithFilter::class,
        'diff_time' => DiffTimeFilter::class,
    ];
}
