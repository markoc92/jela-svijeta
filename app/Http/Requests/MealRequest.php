<?php

namespace App\Http\Requests;

use App\Models\Language;
use App\Rules\CommaNumbers;
use Illuminate\Validation\Rule;
use Axiom\Rules\Lowercase;
use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'per_page' => 'sometimes|integer|min:1',
            'page' => 'sometimes|integer|min:1',
            'category' => 'sometimes|integer|min:1',
            'tags' => ['sometimes', new CommaNumbers],
            'with' => ['sometimes', 'string', new Lowercase, 'starts_with:category,tags,ingredients'],
            'lang' => ['required', Rule::in(Language::pluck('locale')->toArray())],
            'diff_time' => 'sometimes|integer|min:1',
        ];
    }
}
