<?php

if (! function_exists('formatDate')) {
    function formatDate($date, $format = 'Y-m-d H:i:s')
    {
        try {
            if (! $date) {
                return $date;
            }

            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);
        } catch (\Exception $e) {
            $date = date($format, strtotime($date));
        }

        return $date;
    }
}

if (! function_exists('getConst')) {
    function getConst($key = '', $defaultValue = '')
    {
        return config('const.'.$key, $defaultValue);
    }
}

if (! function_exists('isCurrentPage')) {
    function isCurrentPage($segment)
    {
        if (request()->segment(1) === $segment)
            return "class=current";
        return '';
    }
}
