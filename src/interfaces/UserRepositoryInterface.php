<?php

interface UserRepositoryInterface
{
    public  function createUser(User $user);
    public  function updateUser($id);
    public  function deleteUser($id);
    public  function findByID($id);
    public  function usernameExists($username);

}