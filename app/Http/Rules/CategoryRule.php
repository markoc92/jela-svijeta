<?php

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;

class CategoryRule implements Rule
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
        if ((int)$value > 0  || $value == 'NULL' || $value == '!NULL') {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Incorrect "category" query requested. The "category" query must contain at least one of the following: id greater than 0, NULL or !NULL.';
    }
}
