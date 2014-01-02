<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 15/10/13
 * Time: 11:12 AM
 * To change this template use File | Settings | File Templates.
 */

class ReplyController extends BaseController
{

    private $replyService;

    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->replyService = new ReplyService();
    }

    public function getList()
    {
        try {
            $replies = $this->replyService->getList();
            return View::make('reply.list')->with('replies', $replies)->with('pageType', 'replies');
        } catch (Exception $e) {
            return Redirect::to('error')->with('message', Lang::get('responsemessages.internal'));
        }
    }

    public function getEdit($id)
    {
        try {
            $reply = $this->replyService->getReplyById($id);
            if (is_null($reply))
                return Redirect::to('error')->with('message', "Reply not found for a given Id");
        } catch (Exception $e) {
            return Redirect::to('reply/list')->with('message', Lang::get('responsemessages.internal'));
        }
    }

    public function postEdit()
    {
        $data = Input::all();
        $rules = array(
            'id' => 'Required',
            'textMessage' => 'Required'
        );

        $v = Validator::make($data, $rules);
        if ($v->passes()) {
            try {


                $reply = $this->replyService->updateReply($data['id'], $data['textMessage']);
                return Redirect::to('reply/list')->with('status', true)->withInput(array('status' => true, 'message' => 'Status Updated Successfully'));
            } catch (InvalidArgumentException $e) {

            } catch (Exception $e) {
                return Redirect::to('reply/list')->with('status', true)->withInput(array('status' => true, 'message' => Lang::get('responsemessages.internal')));;
            }
        } else {
            return Redirect::to('reply/list')->withErrors($v->getMessageBag())->withInput($data);
        }

    }
}