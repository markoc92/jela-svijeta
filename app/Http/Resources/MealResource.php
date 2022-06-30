<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->statusCalculation($request),
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'ingredients' => IngredientResource::collection($this->whenLoaded('ingredients')),
        ];
    }

    private function statusCalculation($request)
    {
        $status = 'created';
        if ($request->get('diff_time')) {
            if ($this->updated_at > $this->created_at) {
                $status = 'modified';
            }
            if ($this->trashed()) {
                $status = 'deleted';
            }
        }

        return $status;
    }
}
