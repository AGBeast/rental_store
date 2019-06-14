<?php

interface UserRepositoryInterface
{
    public static function createUser();
    public static function updateUser($id);
    public static function deleteUser($id);
    public static function findByID($id);
}