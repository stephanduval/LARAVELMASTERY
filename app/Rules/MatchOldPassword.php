<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Hash;

class MatchOldPassword implements ValidationRule
{

    /**
     * Create a new rule instance.
     *
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
     * @param  mixed[]  $value
     * @return bool
     */
    public function message()
    {
        return 'The :attribute must match the old password.';
    }
}
