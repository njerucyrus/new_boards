<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:32 PM
 */

namespace Entity;


class Order
{
    /**
     * @var
     */
    private $orderNo;
    /**
     * @var
     */
    private $boardId;
    /**
     * @var
     */
    private $amount;
    /**
     * @var
     */
    private $status;
    /**
     * @var
     */
    private $date;

    /**
     * @return mixed
     */
    public function getOrderNo()
    {
        return $this->orderNo;
    }

    /**
     * @param mixed $orderNo
     */
    public function setOrderNo($orderNo)
    {
        $this->orderNo = $orderNo;
    }

    /**
     * @return mixed
     */
    public function getBoardId()
    {
        return $this->boardId;
    }

    /**
     * @param mixed $boardId
     */
    public function setBoardId($boardId)
    {
        $this->boardId = $boardId;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

}