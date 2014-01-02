<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 3:11 PM
 * To change this template use File | Settings | File Templates.
 */

class Result extends Eloquent
{
    protected $table = "results";

    public static $rules = array(
        'name' => 'required',
        'rollNumber' => 'required',
        'result' => 'required',
        'testDate' => 'required'
    );

    public static function parseFromCSV($csvData, $skipHeaderRow = true)
    {
        try {
            $data = array_map("str_getcsv", preg_split('/\r*\n+|\r+/', $csvData));
            $BulkRecords = array();
            $errorRows = array(); //array containing the row numbers of the csv containing errors
            $errorRowCount = 1; //if do not want to skip header row from the csv
            if ($skipHeaderRow) {
                $errorRowCount = 2; //skip the header row
                unset($data[0]);
            }


            foreach ($data as $dataRow) {
                $input = array(
                    'name' => isset($dataRow[0]) ? $dataRow[0] : "",
                    'rollNumber' => isset($dataRow[1]) ? $dataRow[1] : "",
                    'dob' => isset($dataRow[2]) ? $dataRow[2] : null,
                    'schoolName' => isset($dataRow[3]) ? $dataRow[3] : "",
                    'testDate' => isset($dataRow[4]) ? $dataRow[4] : null,
                    'result' => isset($dataRow[5]) ? $dataRow[5] : "",
                    'nextSteps' => isset($dataRow[6]) ? $dataRow[6] : "",
                );
                $validator = Validator::make($input, static::$rules);
                if ($validator->fails()) {
                    $errorRows[] = $errorRowCount;
                    $errorRowCount++;
                    continue;
                }
                $insertRow['name'] = isset($dataRow[0]) ? $dataRow[0] : ""; //Full Name
                if (!isset($dataRow[1])) {
                    continue;
                }
                $insertRow['rollNumber'] = $dataRow[1]; //Roll Number

                $insertRow['dob'] = isset($dataRow[2]) ? $dataRow[2] : ""; //Mobile
                $insertRow['schoolName'] = isset($dataRow[3]) ? $dataRow[3] : ""; //Mobile
                $insertRow['testDate'] = isset($dataRow[4]) ? $dataRow[4] : null; //Mobile

                if (isset($dataRow[5])) {
                    if ($dataRow[5] == "YES" || $dataRow[5] == 'yes' || $dataRow[5] == 'Yes')
                        $insertRow['result'] = 1;
                    if ($dataRow[5] == "NO" || $dataRow[5] == 'no' || $dataRow[5] == 'No')
                        $insertRow['result'] = 0;
                }
                $insertRow['nextSteps'] = isset($dataRow[6]) ? $dataRow[6] : null; //Mobile
                $insertRow['city'] = isset($dataRow[7]) ? $dataRow[7] : null; //Mobile
                $insertRow['created_at'] = new DateTime();
                $insertRow['updated_at'] = new DateTime();
                $BulkRecords[$dataRow[1]] = $insertRow;
                $errorRowCount++;
            }

            return array('bulkRecords' => $BulkRecords, 'errorRows' => $errorRows);
        } catch (Exception $e) {
            throw new InvalidArgumentException($e);
        }
    }
}