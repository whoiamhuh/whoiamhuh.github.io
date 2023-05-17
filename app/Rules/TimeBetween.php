<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;


class TimeBetween implements Rule
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
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        // когда ресторан открыт
        $earliestTime = Carbon::createFromTimeString("10:00:00");
        $lastTime = Carbon::createFromTimeString("23:00:00");

        return $pickupTime->between($earliestTime, $lastTime) ? true : false;
    }

    public function message()
        {
            return 'Пожалуйста, выберите время в промежутке 10:00-23:00.';
        }
    
}
