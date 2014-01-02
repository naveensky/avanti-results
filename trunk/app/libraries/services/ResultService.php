<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 3:13 PM
 * To change this template use File | Settings | File Templates.
 */

class ResultService
{

    private $resultRepo;

    public function __construct()
    {
        $this->resultRepo = new ResultRepository();
    }

    public function getResultByRollNumber($rollNumber)
    {
        return $this->resultRepo->getResultByRollNumber($rollNumber);
    }


    public function bulkInsertResults($data)
    {
        $resultRepo = $this->resultRepo;
        return DB::transaction(function () use ($resultRepo, $data) {
            $rollNumbers = array_keys($data);
            $existingRollNumbersList = $resultRepo->getResultsByRollNumbers($rollNumbers);
            if (count($existingRollNumbersList))
                $resultRepo->deleteResultsByRollNumbers($existingRollNumbersList);
            $resultRepo->bulkInsertResults($data);
            return true;
        });


    }

    public function getResults($name = null, $rollNumber = null, $mobile = null)
    {
        return $this->resultRepo->getResults($name, $rollNumber, $mobile);
    }

    public function deleteResults($ids)
    {
        return $this->resultRepo->deleteResults($ids);
    }

    public function getResult($id = null, $rollNumber = null, $dob = null)
    {
        return $this->resultRepo->getResult($id, $rollNumber, $dob);
    }

    public function updateResult($id, $updatedData)
    {
        return $this->resultRepo->updateResult($id, $updatedData);
    }


}