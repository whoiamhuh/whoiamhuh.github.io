<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;


class DateBetween implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function _construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $pickupDate = Carbon::parse($value);
        $lastDate = Carbon::now()->addWeek();

        return $value >= now() && $value <= $lastDate;
    }

    public function message()
        {
            return 'Пожалуйста, выберите дату через неделю.';
        }
    
}
