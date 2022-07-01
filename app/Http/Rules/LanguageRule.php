<?php

namespace App\Http\Rules;

use App\Models\Language;
use Illuminate\Contracts\Validation\Rule;

class LanguageRule implements Rule
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
        $locales = Language::pluck('locale')->toArray();
        if (in_array($value, $locales)) {
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
        $locales = implode(",",  Language::pluck('locale')->toArray());
        return 'Requested language is not available. Please choose one of the following available languages: ' . $locales;
    }
}
