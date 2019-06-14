<?php

class User extends MySQLDB
{
    //table name
    private $table_name = "users";

    protected $first_name;
    protected $last_name;
    protected $username;
    protected $password;
    protected $role;
    protected $hashed_password;
    protected $date_of_birth;
    protected $permissions = [];


    public function __construct($first_name, $last_name, $username, $password)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username  = $username;
        $this->hashed_password = $this->setHashedPassword($password);
    }

    public function setHashedPassword($password)
    {
        $this->hashed_password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function verifyPassword($password)
    {
        return password_verify($password, $this->hashed_password);
    }

    public function firstName()
    {
        return $this->first_name;
    }

    public function lastName()
    {
        return $this->last_name;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getFullName()
    {
        return $this->first_name ." ".$this->last_name;
    }

    public function getPassword()
    {
        return $this->hashed_password;
    }

    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    public function getUserPermissions()
    {
        return $this->permissions;
    }
}