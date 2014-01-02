<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 12:56 PM
 * To change this template use File | Settings | File Templates.
 */

class RegisterController extends BaseController
{

    private $registrationService;
    private $replyService;

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array("getIndex")));
        $this->registrationService = new RegistrationService();
        $this->replyService = new ReplyService();
    }


    public function getList()
    {
        $name = Input::get('name', null);
        $fromDate = Input::get('fromDate', null);
        $toDate = Input::get('toDate', null);
        $status = Input::get('status', null);
        $city = Input::get('city', null);
        $isDownload = Input::get('download', null);
        $name = empty($name) ? null : $name;
        $fromDate = empty($fromDate) ? null : $fromDate;
        $toDate = empty($toDate) ? null : $toDate;
        $status = empty($status) ? null : $status;
        $city = empty($city) ? null : $city;
        try {
            if ($isDownload) {
                $filePath = $this->registrationService->exportRegistrations($name, $fromDate, $toDate, $status, $city);
                return Response::download($filePath, "registrations.csv");
            }
            $registrations = $this->registrationService->getRegistrations($name, $fromDate, $toDate, $status, $city);
            return View::make('registration.list')->with('registrations', $registrations)->with('pageType', 'register')
                ->with('name', $name)->with('fromDate', $fromDate)->with('toDate', $toDate)->with('status', $status)
                ->with('city', $city);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function postUpdateStatus()
    {
        $url = "register/list";
        try {
            $status = Input::get('status', null);
            $remarks = Input::get('remarks', null);
            $id = Input::get('id');


            if ($_SERVER['HTTP_REFERER'])
                $url = $_SERVER['HTTP_REFERER'];


            if (is_null($id)) {
                return Redirect::to($url)->with('status', false)->withInput(array('status' => false, 'message' => 'Invalid request'));
            }
            $this->registrationService->updateStatus($id, $status, $remarks);
            return Redirect::to($url)->with('status', true)->withInput(array('status' => true, 'message' => 'Status Updated Successfully'));
        } catch (Exception $e) {
            return Redirect::to($url)->with('status', false)->withInput(array('status' => false,'message' => 'Internal Server Error'));
        }
    }


}