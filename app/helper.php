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

if (!function_exists('getMaxIdSurvey')) {
    /**
     * date year to 1950 from date year current
     *
     * @return array
     */
    function getMaxIdSurvey()
    {
        return \App\Models\Survey::getMaxId();
    }
}

if (!function_exists('getRangeYearSurvey')) {
    /**
     * date year to 1950 from date year current
     *
     * @return array
     */
    function getRangeYearSurvey()
    {
        return \App\Models\Survey::getRangeYear();
    }
}
