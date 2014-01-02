<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 8/4/13
 * Time: 1:16 PM
 * To change this template use File | Settings | File Templates.
 */

class Util
{


    public static function convertToAbsoluteURL($filePath)
    {
        try {
            $path = base_path();
            $path = dirname(dirname($path));
            return $path . '/public/' . ltrim($filePath, "/");
        } catch (Exception $e) {
            Log::error($e);
        }
    }


    public static function getParentUrl($value)
    {
        return dirname($value);
    }

    public static function getFileExtension($file)
    {
        $info = new SplFileInfo($file);
        return $info->getExtension();
    }


    public static function pre_login()
    {
        Session::put('pre_login', URL::current());
    }


    public static function getCurrentUTCDateTime()
    {
        return new DateTime('now', new DateTimeZone('UTC'));
    }

    public static function getCurrentUTCTimeString()
    {
        $temp = new DateTime('now', new DateTimeZone('UTC'));
        return $temp->format("Y-m-d H:i:s");
    }

    public static function getDateTimeInString(DateTime $dateTime)
    {
        return $dateTime->format("Y-m-d H:i:s");
    }

    public static function GUID()
    {

        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }


    public static function trimCommas($text)
    {
        return rtrim(ltrim($text, ','), ',');
    }


    public static function is_admin($userId = null)
    {
        $allowedRoles = array('admin');
        if ($userId == null)
            $userId = Auth::User()->id;

        if (empty($userId))
            return false;

        $roles = User::find($userId)->roles;
        $userRoles = array();
        foreach ($roles as $role) {
            $userRoles[] = $role->name;
        }
        if (!empty($userRoles)) {
            $status = false;
            foreach ($allowedRoles as $row) {
                if (in_array($row, $userRoles))
                    $status = true;
                else
                    $status = false;
            }
            return $status;
        }
        return false;
    }


    public static function getMonthFirstDate($date)
    {
        return date('Y-m-01', strtotime($date));
    }

    public static function getMonthLastDate($date)
    {
        return Util::getFormatedDate(date('Y-m-t', strtotime($date)));
    }

    public static function getDayFromDate($date)
    {
        $timestamp = strtotime($date);
        return date('d', $timestamp);
    }

    public static function getMonthFromDate($date)
    {
        $timestamp = strtotime($date);
        return date('m', $timestamp);
    }

    public static function getYearFromDate($date)
    {
        $timestamp = strtotime($date);
        return date('Y', $timestamp);

    }

    public static function getDayNameFromDate($date, $count = null)
    {
        $timestamp = strtotime($date);
        $date = date('l', $timestamp);
        if (!empty($count))
            $date = substr($date, 0, $count);
        return $date;
    }

    public static function getWeekDays()
    {
        return array(
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        );
    }

    public static function getIndividualDate($selectedDates)
    {
        $dates = explode(",", $selectedDates);
        return $dates;
    }


    public static function formatDate($date)
    {
        $oldDate = strtotime($date);
        $timestamp = strtotime($date);
        $day = date('l', $timestamp);
        return date('d-m-Y', $oldDate) . ',' . $day;
    }

    public static function getWeekendsOffDaysOfMonth($date = null)
    {
        if ($date == null)
            $date = date('Y-m-d');
        $weekDays = array();

        $saturdays = array();
        for ($i = 1; $i <= Util::getDayFromDate(Util::getMonthLastDate($date)); ++$i) {
            $dayName = Util::getDayNameFromDate(date('Y-m-' . $i, strtotime($date)));
            if ($dayName == 'Sunday') {
                $weekDays[] = $i;
            } elseif ($dayName == 'Saturday') {
                $saturdays[] = $i;
            }
        }
        $weekDays[] = $saturdays[0];
        $weekDays[] = $saturdays[2];
        return $weekDays;

    }

    public static function checkIfDateIsLieInCurrentMonth($date)
    {
        $first_day_this_month = date('Y-m-01'); // hard-coded '01' for first day
        if ($date >= $first_day_this_month)
            return true;
        return false;
    }

    public static function getFirstDayOfMonthByMonthAndYear($month, $year)
    {
        return Util::getFormatedDate(date("$year-$month-01"));
    }

    public static function getDateFromDayMonthYear($day, $month, $year)
    {
        return Util::getFormatedDate(date("$year-$month-$day"));
    }

    public static function getMonthNameFromNumber($name)
    {
        $monthNameAndNumberKeyValue = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
        return $monthNameAndNumberKeyValue[$name];
    }

    public static function getDateDifference($fromDate, $toDate)
    {
        $now = strtotime($fromDate);
        $your_date = strtotime($toDate);
        $datediff = $now - $your_date;
        return floor($datediff / (60 * 60 * 24));
    }


    public static function getFormatedDate($date)
    {
        $time = strtotime($date);

        $formattedDate = date('Y-m-d', $time);

        return $formattedDate;
    }


    public static function getMonthNameFromDate($date)
    {
        $timestamp = strtotime($date);
        return date('F', $timestamp);
    }

    public static function getPreviousDate($date)
    {
        return date('Y-m-d', strtotime('-1 day', strtotime($date)));
    }
    public static function getNextDayDate($date)
    {
        return date('Y-m-d', strtotime('+1 day', strtotime($date)));
    }
    public static function getListOfDates($month, $year)
    {

        $firstDate = Util::getFormatedDate(date("$year-$month-01"));
        $lastDate = Util::getMonthLastDate($firstDate);
        $startDate = Util::getDayFromDate($firstDate);
        $endDate = Util::getDayFromDate($lastDate);
        $datesArray = Array();
        for ($startDate; $startDate <= $endDate; $startDate++) {
            $datesArray[] = Util::getFormatedDate(date("$year-$month-$startDate"));
        }
        return $datesArray;

    }

    public static function getStatus($status)
    {
        return ($status == 1) ? 'Passed' : 'Failed';

    }

    public static function getPageNumberForRecords($pageNumber, $records, $totalRecords, $take)
    {
        $previous = $pageNumber - 1;
        if ($totalRecords > $take && count($records) == $take)
            $next = $pageNumber + 1;
        else
            $next = 0;

        return array('previous' => $previous, 'next' => $next);
    }



}