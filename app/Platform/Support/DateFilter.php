<?php

namespace App\Platform\Support;

use Carbon\Carbon;

class DateFilter
{
    public static function resolve(?string $filter, ?string $from = null, ?string $to = null): array
    {
        return match ($filter) {
            'today' => [
                Carbon::today(),
                Carbon::today()->endOfDay(),
            ],

            'yesterday' => [
                Carbon::yesterday(),
                Carbon::yesterday()->endOfDay(),
            ],

            'this_week' => [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ],

            'last_week' => [
                Carbon::now()->subWeek()->startOfWeek(),
                Carbon::now()->subWeek()->endOfWeek(),
            ],

            'this_month' => [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ],

            'last_month' => [
                Carbon::now()->subMonth()->startOfMonth(),
                Carbon::now()->subMonth()->endOfMonth(),
            ],

            'this_quarter' => [
                Carbon::now()->startOfQuarter(),
                Carbon::now()->endOfQuarter(),
            ],

            'last_quarter' => [
                Carbon::now()->subQuarter()->startOfQuarter(),
                Carbon::now()->subQuarter()->endOfQuarter(),
            ],

            'this_year' => [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ],

            'last_year' => [
                Carbon::now()->subYear()->startOfYear(),
                Carbon::now()->subYear()->endOfYear(),
            ],

            'last_7_days' => [
                Carbon::now()->subDays(7)->startOfDay(),
                Carbon::now()->endOfDay(),
            ],

            'last_30_days' => [
                Carbon::now()->subDays(30)->startOfDay(),
                Carbon::now()->endOfDay(),
            ],

            'last_90_days' => [
                Carbon::now()->subDays(90)->startOfDay(),
                Carbon::now()->endOfDay(),
            ],

            'custom' => [
                $from ? Carbon::parse($from)->startOfDay() : null,
                $to ? Carbon::parse($to)->endOfDay() : null,
            ],

            default => [
                null,
                null,
            ],
        };
    }
}
