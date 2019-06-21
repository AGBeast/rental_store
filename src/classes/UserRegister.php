<?php

class UserRegister
{
    private $repo;
    protected $db;

    public function __construct(UserRepository $repo, $db)
    {
        $this->db = $db;
        $this->repo = new UserRepository($db);
    }

    private function isValidUsername($username)
    {
        if(isset($username) && is_string($username)){
            return true;
        }else{
            return false;
        }
    }

    private function isValidPassword($password)
    {
        if(strlen($password) && !preg_match("#[0-9]+#",$password) && !preg_match("#[a-zA-Z]+#",$password)){
            return true;
        } else {
            return false;
        }
    }

    private function isUniqueUsername($username)
    {   
       $result = $this->repo->usernameExists($username);
       return $result;
    }



    public function register(User $user)
    {
        if($this->isValidUsername($user->getUsername()) && $this->isUniqueUsername($user->getUsername())){
            $_username = $user->getUsername();
        } else{
            throw new ErrorException("Invalid Username");
        }

        if($this->isValidPassword($user->getUsername())){
            $_password = $user->getPassword();
        }else{
            throw new ErrorException("Invalid Password");
        }

        
    }
}