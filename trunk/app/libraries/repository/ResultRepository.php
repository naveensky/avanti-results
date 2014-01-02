<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 3:12 PM
 * To change this template use File | Settings | File Templates.
 */

class ResultRepository
{

    public function getResultByRollNumber($rollNumber)
    {
        try {
            return Result::where('rollNumber', '=', $rollNumber)->first();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }


    public function bulkInsertResults($data)
    {
        try {
            $records = Result::insert($data);
            return $records;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function getResults($name = null, $rollNumber = null)
    {
        try {
            $query = DB::table('results');

            if (!empty($name))
                $query = $query->where('name', 'like', "%$name%");
            if (!empty($rollNumber))
                $query = $query->where('rollNumber', 'like', "%$rollNumber%");

            return $query->paginate(Constants::PAGING_COUNT);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function deleteResults($ids)
    {
        try {
            return Result::whereIn('id', $ids)->delete();

        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function getResult($id, $rollNumber, $dob)
    {
        try {
            $query = DB::table('results');
            if (!is_null($id))
                $query->where('id', '=', $id);
            if (!is_null($rollNumber))
                $query->where('rollNumber', '=', $rollNumber);
            if (!is_null($rollNumber))
                $query->where('dob', '=', $dob);
            return $query->first();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function updateResult($id, $updatedData)
    {
        try {
            return Result::where('id', $id)->update($updatedData);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function getResultsByRollNumbers($rollNumbers)
    {
        try {
            return Result::whereIn('rollNumber', $rollNumbers)->get(array('rollNumber'))->lists('rollNumber');
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function deleteResultsByRollNumbers($rollNumbers)
    {
        try {
            return Result::whereIn('rollNumber', $rollNumbers)->delete();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

}