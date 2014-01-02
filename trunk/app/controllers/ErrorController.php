<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 24/7/13
 * Time: 1:24 PM
 * To change this template use File | Settings | File Templates.
 */

class ErrorController extends BaseController
{

    public function getIndex()
    {
        $message = Session::get('message');
        if (empty($message))
            $message = Lang::get('responsemessages.resource_not_found');
        return View::make('errors.appErrors')->with('message', $message)->with('pageType','');
    }
}