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

if (!function_exists('getStatusZScore')) {

    /**
     * @param $zScore
     * @return string
     */
    function getStatusZScore($zScore)
    {
        if ($zScore < -4) {
            return 'Suy dinh dưỡng dộ III';
        } else if ($zScore > -4 && $zScore < -3) {
            return 'Suy dinh dưỡng dộ II';
        } else if ($zScore > -3 && $zScore < -2) {
            return 'Suy dinh dưỡng dộ I';
        } else {
            return 'Bình thường';
        }
    }
}

if (!function_exists('getStatusBMI')) {

    /**
     * @param $bmi
     * @return string
     */
    function getStatusBMI($bmi)
    {
        if ($bmi < 16) {
            return 'Gầy độ III';
        } else if ($bmi >= 16 && $bmi < 17) {
            return 'Gầy độ II';
        } else if ($bmi >= 17 && $bmi < 18.5) {
            return 'Gầy độ I';
        } else if ($bmi >= 18.5 && $bmi < 25) {
            return 'Bình thường';
        } else if ($bmi >= 25 && $bmi < 30) {
            return 'Thừa cân độ I';
        } else if ($bmi >= 30 && $bmi < 40) {
            return 'Thừa cân độ II';
        } else if ($bmi >= 40) {
            return 'Thừa cân độ III';
        }
    }
}

if (!function_exists('getBMIPoint')) {
    /**
     * @param $weight
     * @param $height
     * @return float
     */
    function getBMIPoint($weight, $height)
    {
        $height = $height / 100;
        return round($weight / ($height * $height), 2);
    }
}

if (!function_exists('getWeightIdeal')) {
    /**
     * @param $height
     * @return array
     */
    function getWeightIdeal($height)
    {
        $height = $height / 100;
        return [
            'min' => round(18.5 * $height * $height, 2),
            'max' => round(22.9 * $height * $height, 2),
        ];
    }
}

if (!function_exists('getRuleDataRequest')) {
    /**
     * @param $type
     * @param $isSimulation
     * @return array
     */
    function getRuleDataRequest($type, $isSimulation)
    {
        $listAttr = ATTRIBUTE_DATA[$type];
        $rules = [];
        foreach ($listAttr as $item) {
            if ($item == 'fat_percentage') {
                $rules[$item] = ['bail', 'required', 'numeric', 'between: 0.01,99.99'];
            } elseif ($item == 'gender') {
                $rules[$item] = ['bail', 'required', 'numeric', 'between: 0,1'];
            } else {
                $rules[$item] = ['bail', 'required', 'numeric', 'between: 1,1000'];
            }
        }
        if ($isSimulation == 'simulation') {
            unset($rules['survey_id']);
            unset($rules['user_id']);
            unset($rules['province_id']);
            unset($rules['district_id']);
        } else {
            $rules['survey_id'] = 'required';
        }
        return $rules;
    }
}
