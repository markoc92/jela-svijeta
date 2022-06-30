<?php

// DiffTimeFilter.php

namespace App\Http\Filters;

class  DiffTimeFilter
{
    public function filter($builder, $value)
    {
        $timestamp = date('Y-m-d H:i:s', $value);

        return $builder->withTrashed()
            ->where('created_at', '>=', $timestamp)
            ->orWhere('updated_at', '>=', $timestamp)
            ->orWhere('deleted_at', '>=', $timestamp);
    }
}
