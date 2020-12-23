<?php

if (!function_exists('dateYear')) {
    /**
     * date year to 1950 from date year current
     *
     * @return array
     */
    function dateYear()
    {
        return range(date('Y') + 2,DATE_YEAR_MIN, -1);
    }
}
