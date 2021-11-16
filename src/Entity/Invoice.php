<?php

namespace App\src\Entity;

class Invoice
{
    private $id;
    private $amount;
    private $sendingAt;
    private $paidFor;
    private $status;
    private $customer_id;
    private $user_id;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of sendingAt
     */
    public function getSendingAt()
    {
        return $this->sendingAt;
    }

    /**
     * Set the value of sendingAt
     *
     * @return  self
     */
    public function setSendingAt($sendingAt)
    {
        $this->sendingAt = $sendingAt;

        return $this;
    }

    /**
     * Get the value of paidFor
     */
    public function getPaidFor()
    {
        return $this->paidFor;
    }

    /**
     * Set the value of paidFor
     *
     * @return  self
     */
    public function setPaidFor($paidFor)
    {
        $this->paidFor = $paidFor;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of customer_id
     */
    public function getCustomer_id()
    {
        return $this->customer_id;
    }

    /**
     * Set the value of customer_id
     *
     * @return  self
     */
    public function setCustomer_id($customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}
