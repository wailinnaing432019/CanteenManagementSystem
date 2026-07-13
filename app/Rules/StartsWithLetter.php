<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class StartsWithLetter implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

        public function passes($attribute, $value)
    {
        return preg_match('/^[A-Za-z][A-Za-z\s]*$/', $value) === 1;
    }

    public function message()
    {
        return 'The :attribute must start with a letter and cannot contain special characters.';
    }
}