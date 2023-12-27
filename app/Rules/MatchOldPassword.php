<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Hash;
use Auth;

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

    public function passes($attribute, $value)
    {
        return Hash::check($value, auth()->user()->password);
    }

    /**
     * Get the validation error message.
     *
     * @param  string  $attribute
     * @param  mixed[]  $value
     * @return string
     */
    public function message()
    {
        return 'The old password deos not match';
    }
}
