<?php

// TagFilter.php

namespace App\Http\Filters;

class  TagFilter
{
    public function filter($builder, $value)
    {
        $tag_ids = explode(',', $value);

        foreach ($tag_ids as $tag_id) {
            $builder = $builder->whereHas('tags', function ($query) use ($tag_id) {

                $query->where('tag_id', $tag_id);
            });
        }

        return $builder;
    }
}
