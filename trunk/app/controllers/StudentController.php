<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 6:47 PM
 * To change this template use File | Settings | File Templates.
 */

class StudentController extends BaseController
{
    private $resultService;

    public function __construct()
    {
        $this->resultService = new ResultService();
    }

    public function getIndex()
    {
        $rollNumber = Input::get('rollNumber', null);
        $dob = Input::get('dob', null);

        if (!empty($dob) && !empty($rollNumber)) {
            $result = $this->resultService->getResult(null, $rollNumber, $dob);
            return View::make('student.home')->with('pageType', 'home')->with('result', $result);
        } else {
            return View::make('student.home')->with('pageType', 'home')->with('result', false);
        }

    }

    public function postIndex()
    {
        $data = Input::all();

        $rules = array(
            'rollNumber' => 'Required',
            'dob' => 'Required'

        );
        $v = Validator::make($data, $rules);
        if ($v->passes()) {
            $result = $this->resultService->getResult(null, $data['rollNumber'], $data['dob']);
            return Response::json($result);
        } else {
            return Response::json(array('message' => 'Please fill required fields'));
        }
    }
}