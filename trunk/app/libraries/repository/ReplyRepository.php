<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 1:57 PM
 * To change this template use File | Settings | File Templates.
 */

class ReplyRepository
{

    public function getReply($code)
    {
        try {
            return Reply::where('code', '=', $code)->first();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function getList()
    {
        try {
            return Reply::all();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function updateReply($id, $message)
    {
        try {
            $reply = Reply::where('id', '=', $id)->first();
            if (is_null($reply))
                throw new InvalidArgumentException("Reply not found");
            $reply->replyText = $message;
            $reply->save();
            return $reply;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function getReplyById($id)
    {
        try {
            return Reply::where('id', '=', $id)->first();
        } catch (Exception $e) {
            Log::error($e);
        }
    }


}