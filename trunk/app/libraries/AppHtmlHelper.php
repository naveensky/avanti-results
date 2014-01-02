<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 8/5/13
 * Time: 9:02 AM
 * To change this template use File | Settings | File Templates.
 */

class AppHtmlHelper
{
    public static function getNewOrOldInput($oldInput, $newInput)
    {
        if (empty($oldInput))
            return $newInput;
        return $oldInput;
    }

    public static function getValidationClass($value)
    {
        if ($value)
            return "alert-success alert";
        else {
            return "alert-error alert";
        }

    }

    public static  function getStatusClass($value)
    {
        if ($value)
            return "success";
        return "error";
    }


}