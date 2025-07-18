<?php

namespace App\Enums;



class Year 
{

    /**
     * Get an array of years from $startYear to current year.
     *
     * @param int $startYear
     * @param bool $descending
     * @return array
     */
    public static function list(int $startYear = 1940, bool $descending = false): array
    {
        $currentYear = date('Y');
        $years = range($startYear, $currentYear);

        return $descending ? array_reverse($years) : $years;
    }
    

}
