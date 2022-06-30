<?php

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;

class AcceptedInput implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $keywords = explode(',', $value);
        $acceptable = array('category', 'tags', 'ingredients');

        if (!array_diff($keywords, $acceptable)) {
            return true;
        };

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Incorrect "with" query requested. The "with" query must contain at least one of the following: category, tags, ingredients.';
    }
}
