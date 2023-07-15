<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\App;

class NotSameEmail implements ValidationRule
{
    public function __construct(public string $currentEmail)
    {
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value == $this->currentEmail) {
            $fail(App::isLocale('en') ? 'You didn\'t change the email address.' : 'لم تقم بتغيير البريد الإلكتروني');
        }
    }
}
