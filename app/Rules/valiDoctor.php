<?php

namespace App\Rules;
use App\User;
use Illuminate\Contracts\Validation\Rule;

class valiDoctor implements Rule
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
        if($value->input('doctor') == auth()->user()->name && auth()->user()->isdoctor == 1){
            return true;
        } else {
            return false ;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
