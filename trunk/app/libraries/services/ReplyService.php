<?php
/**
 * Created by JetBrains PhpStorm.
 * User: keshav
 * Date: 16/9/13
 * Time: 2:02 PM
 * To change this template use File | Settings | File Templates.
 */

class ReplyService
{
    private $replyRepo;

    public function __construct()
    {
        $this->replyRepo = new ReplyRepository();
    }

    public function getReply($code)
    {
        return $this->replyRepo->getReply($code);
    }


    public function getList()
    {
        return $this->replyRepo->getList();
    }

    public function updateReply($id, $message)
    {
        return $this->replyRepo->updateReply($id, $message);
    }

    public function getReplyById($id)
    {
        return $this->replyRepo->getReplyById($id);
    }
}