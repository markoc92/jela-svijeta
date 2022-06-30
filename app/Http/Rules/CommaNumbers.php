<?php

namespace App\Http\Rules;

use Illuminate\Contracts\Validation\Rule;

class CommaNumbers implements Rule
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

        foreach ($keywords as $keyword) {
            if (!filter_var($keyword, FILTER_VALIDATE_INT)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The tag must be comma separated integer greater than 0.';
    }
}
