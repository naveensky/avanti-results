<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 1:02 PM
 * To change this template use File | Settings | File Templates.
 */

class RegistrationService
{
    private $registrationRepo;

    public function __construct()
    {
        $this->registrationRepo = new RegistrationRepository();
    }

    public function addRegistration($name, $mobile, $city, $registrationDate)
    {
        return $this->registrationRepo->addRegistration($name, $mobile, $city, $registrationDate);
    }

    public function getRegistrations($name, $fromDate, $toDate, $status, $city)
    {
        return $this->registrationRepo->getRegistrations($name, $fromDate, $toDate, $status, $city);
    }

    public function updateStatus($id, $status, $comments)
    {
        return $this->registrationRepo->updateStatus($id, $status, $comments);
    }

    public function exportRegistrations($name, $fromDate, $toDate, $status, $city)
    {
        try {
            $fileName = Config::get('custom.exportPath') . Util::GUID() . '.csv';

            $csvFile = new CSV($fileName);
            $row = array('name', 'mobile', 'city', 'date', 'status', 'remarks');
            $csvFile->writeRow($row);
            $results = $this->registrationRepo->getRegistrationsForExport($name, $fromDate, $toDate, $status, $city);
            foreach ($results as $result) {
                $csvFile->writeRow(array($result->name, $result->mobile, $result->city, $result->registrationDate,
                    $result->status, $result->remarks));
            }
            return $fileName;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}