<?php

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Modules\ConfigModule\Entities\Config;

function bulkDelete($table_name, $ids, $extra_conditions = 1): int
{
    $arr = explode(',', $ids);
    $params = array_fill(0, count($arr), '?');
    $params = implode(',', $params);
    DB::delete("DELETE IGNORE FROM `{$table_name}` WHERE `id` IN ({$params}) AND {$extra_conditions}", $arr);
//    $warning = DB::select('SELECT @@warning_count as `warnings`');
//    return $warning[0]->warnings ?? 0;
    return 0;
//    $warning = DB::select("DELETE IGNORE FROM `{$table_name}` WHERE `id` IN (?) AND {$extra_conditions};SELECT @@warning_count as `warnings`;", [$ids]);
//    DB::statement("DELETE IGNORE FROM `{$table_name}` WHERE `id` IN (?) AND {$extra_conditions}", [$ids]);
}

function is_video($fileName): bool
{
    $arr = explode('.', $fileName);
    $ext = strtolower(end($arr));
    return (in_array($ext, ['mp4', 'mov']));
}

function is_image($fileName): bool
{
    $arr = explode('.', $fileName);
    $ext = strtolower(end($arr));
    return (in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'jfif']));
}


if (!function_exists('notify')) {
    function notify($notifiable, $notification)
    {
        try {
            $notifiable->notify($notification);
        } catch (Exception $exception) {
//
        }
    }
}

if (!function_exists('humanReadableDiff')) {
    function humanReadableDiff(\Carbon\Carbon $to, \Carbon\Carbon $from): string
    {
        return $to ? now()->addMinutes($to->diffInMinutes($from))->diffForHumans(null, true) : '-';
    }
}

if (!function_exists('getSiteName')) {
    function getSiteName(): string
    {
        return Config::where('key', 'site_name')->first()->{'value_' . app()->getLocale()} ?? 'Site Name';
    }
}

if (!function_exists('convertArabicNumToEnglish')) {
    function convertArabicNumToEnglish($arabic): string
    {
        $trans = [
            "٠" => "0",
            "١" => "1",
            "٢" => "2",
            "٣" => "3",
            "٤" => "4",
            "٥" => "5",
            "٦" => "6",
            "٧" => "7",
            "٨" => "8",
            "٩" => "9",
        ];

        return strtr($arabic, $trans);
    }
}
