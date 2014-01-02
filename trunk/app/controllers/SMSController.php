<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 26/9/13
 * Time: 12:05 PM
 * To change this template use File | Settings | File Templates.
 */

class SMSController extends BaseController
{


    private $registrationService;
    private $replyService;
    private $resultService;

    public function __construct()
    {

        $this->replyService = new ReplyService();
        $this->resultService = new ResultService();
        $this->registrationService = new RegistrationService();
    }

    public function getIndex()
    {

        $message = Input::get('KEYVALUE', null);
        $mobile = Input::get('MOBILENO', null);
        if (is_null($message)) {
            echo "Invalid Request";
            return;
        }

        $messageArray = explode(' ', $message);

        if (!isset($messageArray[2])) {
            echo  "Invalid Request";
            return;
        }

        if (strcasecmp('RESULT', $messageArray[1]) == 0) {

            try {
                $result = $this->resultService->getResultByRollNumber($messageArray[2]);
                if (is_null($result)) {
                    echo "Roll Number not found";
                } else {
                    if ($result->result) {
                        echo $this->replyService->getReply(4)->replyText;
                    } else {
                        echo $this->replyService->getReply(5)->replyText;
                    }
                }
            } catch (Exception $e) {
                echo "Internal Server Error";
            }
        } elseif (strcasecmp('REG', $messageArray[1]) == 0) {
            if (!isset($messageArray[3]) || $mobile == null) {
                echo  "Invalid Request";
                return;
            }

            $name = trim(implode(' ', array_splice($messageArray, 3)));
            $city = $messageArray[2];
            try {

                if (strcasecmp($city, "DEL") == 0) {
                    $code = 1;
                } elseif (strcasecmp($city, "MUM") == 0) {
                    $code = 2;
                } else {
                    $code = 3;
                }
                $registrationInstance = $this->registrationService->addRegistration(ucwords($name), $mobile, $city, new DateTime());
                echo $this->replyService->getReply($code)->replyText;
            } catch (Exception $e) {
                echo "Internal Server Error";
                return;
            }
        } else {
            echo  "Invalid Request";
        }


    }
}