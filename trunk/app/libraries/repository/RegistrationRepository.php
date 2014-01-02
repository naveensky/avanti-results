<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 1:03 PM
 * To change this template use File | Settings | File Templates.
 */

class RegistrationRepository
{

    public function addRegistration($name, $mobile, $city, $registrationDate)
    {
        try {
            $status = Constants::getStatuses();
            $registration = new Registration();
            $registration->name = $name;
            $registration->mobile = $mobile;
            $registration->city = $city;
            $registration->registrationDate = $registrationDate;
            $registration->status = $status[0];
            $registration->save();
            return $registration;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }

    }

    public function getRegistrations($name, $fromDate, $toDate, $status, $city)
    {
        try {
            $query = Registration::orderBy('registrationDate', 'desc');
            if ($name)
                $query->where('name', '=', $name);
            if ($fromDate)
                $query->where('registrationDate', '>=', $fromDate);
            if ($toDate)
                $query->where('registrationDate', '>=', Util::getNextDayDate($toDate));
            if ($status)
                $query->where('status', '=', $status);
            if ($city)
                $query->where('city', '=', $city);
            return $query->paginate(Constants::PAGING_COUNT);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function updateStatus($id, $status, $comments)
    {
        try {
            return Registration::where('id', '=', $id)->update(array('status' => $status, 'remarks' => $comments));
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function getRegistrationsForExport($name, $fromDate, $toDate, $status, $city)
    {
        try {
            $query = Registration::orderBy('updated_at', 'desc');
            if ($name)
                $query->where('name', '=', $name);
            if ($fromDate)
                $query->where('registrationDate', '>=', $fromDate);
            if ($toDate)
                $query->where('registrationDate', '>=', Util::getNextDayDate($toDate));
            if ($status)
                $query->where('status', '=', $status);
            if ($city)
                $query->where('city', '=', $city);
            return $query->get();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}