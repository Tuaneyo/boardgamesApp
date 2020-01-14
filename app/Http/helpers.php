<?php
/**
 * Created by PhpStorm.
 * User: Tuan
 * Date: 1/10/2019
 * Time: 7:17 AM
 */

if ( !function_exists('countArrayValues') )
{
    /**
     * create function to count existing array
     * @var $array array input
     * @var $match
     * @return $imageNamee
     * */

    function countArrayValues($array, $match)
    {
        $count = 0;

        foreach ($array as $key => $value)
        {
            if ($array[$key]['publisher_id'] == $match)
            {
                $count++;
            }
        }

        return $count;
    }
}

if ( !function_exists('euroDate') )
{
    /**
     * create function to change date format
     * @var $date date
     * @return $date string
     * */
    function euroDate($date)
    {
        $date = \Illuminate\Support\Carbon::parse($date)->format('d-m-Y');
        return $date;
    }

}
