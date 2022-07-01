<?php

// DiffTimeFilter.php

namespace App\Http\Filters;

use Carbon\Carbon;

class  DiffTimeFilter
{
    public function filter($builder, $value)
    {
        $timestamp = Carbon::createFromTimestamp($value);

        return $builder->withTrashed()->where(function ($query) use ($timestamp) {
            return $query
                ->where('created_at', '>', $timestamp)
                ->orWhere('updated_at', '>', $timestamp)
                ->orWhere('deleted_at', '>', $timestamp);
        });
    }
}
