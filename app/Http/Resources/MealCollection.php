<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MealCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }

    public function withResponse($request, $response)
    {
        $data = $response->getData(true);

        $currentPage = $data['meta']['current_page'];
        $totalItems = $data['meta']['total'];
        $itemsPerPage = $data['meta']['per_page'];
        $totalPages = $data['meta']['last_page'];

        $data['meta'] = compact('currentPage', 'totalItems', 'itemsPerPage', 'totalPages');

        $prev = $data['links']['prev'];
        $next = $data['links']['next'];
        $self = $request->fullUrlWithQuery($request->query());

        $data['links'] = compact('prev', 'next', 'self');

        $data = array('meta' => $data['meta']) + $data;
        $response->setData($data);
    }
}
