<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 2:29 PM
 * To change this template use File | Settings | File Templates.
 */

class ResultController extends BaseController
{

    private $replyService;
    private $resultService;

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array("getIndex")));
        $this->replyService = new ReplyService();
        $this->resultService = new ResultService();
    }


    public function getImport()
    {
        try {
            $results = $this->resultService->getResults();
            return View::make('result.import')->with('pageType', 'import')->with('results', $results);
        } catch (Exception $e) {
            echo "Error";
        }

    }

    public function postImport()
    {
        $data = Input::all();

        $rules = array(
            'importRecords' => 'Required|mimes:txt,text/csv'

        );
        $v = Validator::make($data, $rules);
        if ($v->passes()) {
            if (!$data['importRecords']->isValid()) {
                $fileUploadingErrors = "Error while uploading file: " . $data['importRecords']->getClientOriginalName();
                Log::error($data['importRecords']->getError());
                return Redirect::to('/record/import')->with("message", $fileUploadingErrors)->with('status', false);
            }
            $contents = File::get($data['importRecords']->getPathname());
            File::delete($data['importRecords']->getPathname());
            $contents = trim($contents);
            try {
                $result = Result::parseFromCSV($contents);
                if (empty($result['bulkRecords'])) {
                    return Redirect::to('/result/import')->with("message", Lang::get('responsemessages.no_records_imported'))->with('status', false)->with('rowNumbersError', implode(', ', $result['errorRows']));
                }
                $isInserted = $this->resultService->bulkInsertResults($result['bulkRecords']);
                return Redirect::to("/result/import")->with('status',true)->with('message','Results uploaded successfully');

            } catch (InvalidArgumentException $e) {
                unset($data['importRecords']);
                Log::error($e);
                return Redirect::to("/result/import")->withInput($data)->with('status', false)->with("message", Lang::get('responsemessages.csv_parse_error'));
            }
            catch (Exception $e) {
                unset($data['importRecords']);
                Log::error($e);
                return Redirect::to("/result/import")->withInput($data)->with('status', false)->with("message", Lang::get('responsemessages.database'));
            }

        } else {

            return Redirect::to('/result/import')->withErrors($v->getMessageBag());
        }
    }

    public function postDelete()
    {
        $data = Input::all();
        $ids = isset($data['ids']) ? $data['ids'] : array();
        try {
            $this->resultService->deleteResults($ids);
            return Response::json(array('status' => true));
        } catch (Exception $e) {
            return Response::json(array('status' => false));
        }
    }

    public function getSampleFile()
    {
        $sampleFilePath = public_path() . "/uploads/sampleResultFile.csv";
        return Response::download($sampleFilePath,'sample result.csv');


    }

}