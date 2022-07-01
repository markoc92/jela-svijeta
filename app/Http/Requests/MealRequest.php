<?php

namespace App\Http\Requests;

use App\Models\Language;
use Axiom\Rules\Lowercase;
use Illuminate\Validation\Rule;
use App\Http\Rules\CommaNumbers;
use App\Http\Rules\AcceptedInput;
use App\Http\Rules\CategoryRule;
use App\Http\Rules\LanguageRule;

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
            'category' => ['sometimes', new CategoryRule],
            'tags' => ['sometimes', new CommaNumbers],
            'with' => ['sometimes', 'string', new Lowercase, new AcceptedInput],
            'lang' => ['required', new LanguageRule],
            'diff_time' => 'sometimes|integer|min:1',
        ];
    }
}
