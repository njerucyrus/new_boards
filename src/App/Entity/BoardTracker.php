<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:35 PM
 */

namespace App\Entity;


class BoardTracker
{
    /**
     * @var
     */
    private  $boardCode;
    /**
     * @var
     */
    private  $customer;
    /**
     * @var
     */
    private  $dateBooked;
    /**
     * @var
     */
    private  $days;

    /**
     * @return mixed
     */
    public function getBoardCode()
    {
        return $this->boardCode;
    }

    /**
     * @param mixed $boardCode
     */
    public function setBoardCode($boardCode)
    {
        $this->boardCode = $boardCode;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getDateBooked()
    {
        return $this->dateBooked;
    }

    /**
     * @param mixed $dateBooked
     */
    public function setDateBooked($dateBooked)
    {
        $this->dateBooked = $dateBooked;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }


}