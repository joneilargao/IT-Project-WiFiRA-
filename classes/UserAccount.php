<?php

/**
 * Created by PhpStorm.
 * User: 
 * Date: 5/22/17
 */
class UserAccount
{
    private $accountNo, $roleId, $name, $address, $username, $password, $accountStatus, $image;

    /**
     * UserAccount constructor.
     * @param $accountNo
     * @param $roleId
     * @param $name
     * @param $address
     * @param $username
     * @param $password
     * @param $accountStatus
     * @param $image
     */
    public function __construct($accountNo, $roleId, $name, $address, $username, $password, $accountStatus, $image)
    {
        $this->accountNo = $accountNo;
        $this->roleId = $roleId;
        $this->name = $name;
        $this->address = $address;
        $this->username = $username;
        $this->password = $password;
        $this->accountStatus = $accountStatus;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountNo;
    }

    /**
     * @param mixed $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountNo = $accountNo;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $firstName
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->accountStatus;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($accountStatus)
    {
        $this->accountStatus = $accountStatus;
    }

    /**
     * @return mixed
     */
    public function getUserPicture()
    {
        return $this->image;
    }

    /**
     * @param mixed $userPicture
     */
    public function setUserPicture($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * @param mixed $roleId
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }
    
}