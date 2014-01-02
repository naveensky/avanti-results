<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 1:18 PM
 * To change this template use File | Settings | File Templates.
 */

class Constants
{
    const REGISTRATION_CODE_DELHI = 1;
    const REGISTRATION_CODE_MUMBAI = 2;
    const REGISTRATION_CODE_KANPUR = 3;
    const PAGING_COUNT = 25;

    public static function getStatuses()
    {
        return array('New Entry', 'Contacted');
    }

    public static function getReplyType($code)
    {
        $message = "";
        switch ($code) {
            case 1:
                $message = "Delhi Registration Message";
                break;
            case 2:
                $message = "Mumbai Registration Message";
                break;
            case 3:
                $message = "Kanpur Registration Message";
                break;
            case 4:
                $message = "Result Cleared Message";
                break;
            case 5:
                $message = "Result Failed Message";
                break;
        }
        return $message;
    }
}