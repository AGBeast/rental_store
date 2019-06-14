<?php

class UserRepository implements UserRepositoryInterface
{
    protected $dataStore;


    public function __construct(PDO $db)
    {
        $this->dataStore = $db;
    }

    public static function findByID($id)
    {
        //TODO: flesh out this method to retrieve a user's information via their ID and only returns 1   
    }


    public static function createUser(User $user)
    {
        $query = "INSERT INTO :table (first_name, last_name, username, password, date_of_birth) 
                VALUES (:first_name, :last_name, :role, :username, :password, :date_of_birth,)";
        try{
           $stmt = $this->dataStore->prepare($query);
           $stmt->bindParam(':first_name', $user->firstName(),PDO::PARAM_STR);
           $stmt->bindParam(':last_name',  $user->lastName(), PDO::PARAM_STR);
           $stmt->bindParam(':username', $user->getUsername(),PDO::PARAM_STR);
           $stmt->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
           $stmt->bindParam(':date_of_birth', $user->getDateOfBirth(), PDO::PARAM_STR);
           
           $stmt->execute();


        }catch(PDOException $e){
           echo "The following message was generated ".$e->getMessage();
        }
    }

    public static function updateUser($id)
    {
        //TODO: flesh out this method to update a user based on the provided user id
    }

    public static function deleteUser($id)
    {
        //TODO: flesh out this method to delete a user based on the provided user id
    }


}