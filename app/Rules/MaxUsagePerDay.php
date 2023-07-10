<?php

namespace App\Rules;

use App\Pengiriman;
use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;


class MaxUsagePerDay implements Rule
{
    protected $maxUsage;

    public function __construct($maxUsage)
    {
        $this->maxUsage = $maxUsage;
    }

    public function passes($attribute, $value)
    {
        $today = Carbon::today();
        $count = Pengiriman::where('lokasi_id', $value)
            ->whereDate('created_at', $today)
            ->count();

        return $count < $this->maxUsage;
    }

    public function message()
    {
        return 'The :attribute has exceeded the maximum usage limit for the day.';
    }
}