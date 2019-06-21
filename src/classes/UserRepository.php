<?php

class UserRepository implements UserRepositoryInterface
{
    protected $dataStore;

    private $table = 'Users';




    public function __construct(PDO $db)
    {
        $this->dataStore = $db;
    }

    public function findByID($id)
    {
        //TODO: flesh out this method to retrieve a user's information via their ID and only returns 1   

        $query = "SELECT * FROM users WHERE id = :id";
        try{
        $stmt = $this->dataStore->prepare($query);
        

        }catch(PDOException $e){
            echo "The following error occured: ". $e->getMessage();
        }
    }


    public function usernameExists($username)
    {
        
        try{
          $query = "SELECT username FROM Users WHERE username = :username";
          $stmt = $this->dataStore->prepare($query);
          $stmt->bindParam(':username', $username,PDO::PARAM_STR);
          $stmt->execute();
          if($stmt->fetchColumn()){
              return true;
          }else{
              return false;
          }
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }


    public function createUser(User $user)
    {
        $query = "INSERT INTO Users (first_name, last_name, username, hashed_password, last_login, permission) 
                VALUES (:first_name, :last_name,:username, :hashed_password, :last_login,:permission)";
        
        try{
           $stmt = $this->dataStore->prepare($query);
           $username = $user->getUsername();
           $password = $user->getPassword();
           $first_name = $user->firstName();
           $last_name  = $user->lastName(); 
           $permission = "Admin";
           $date = date("Y-m-d H:i:s");


           $stmt->bindParam(':username', $username,PDO::PARAM_STR);
           $stmt->bindParam(':hashed_password', $password, PDO::PARAM_STR);
           $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
           $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
           $stmt->bindParam(':last_login', $date);
           $stmt->bindParam(':permission', $permission, PDO::PARAM_STR);

           
           $stmt->execute();

           if($stmt->columnCount() == 1){
               return true;
           }else {
               return false;
           }


        }catch(PDOException $e){
           echo "The following message was generated ".$e->getMessage();
        }
    }

    private function findHash($username)
    {
        $query = "SELECT hashed_password FROM Users WHERE username = :username";
        try{
            $stmt = $this->dataStore->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $hash = $stmt->fetch();
            return $hash;
        }catch(PDOException $e){
            echo "Error ". $e->getMessage();
        }

    }

    public function findUserByCredentials($username, $password)
    {
        try{
        $query = "SELECT EXISTS(SELECT * FROM Users WHERE username = :username AND password = :password)";
        $stmt = $this->dataStore->prepare($query);

        $password = $this->findHash($username);
        $stmt->bindParam(':username',$username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }else {
            return false;
        }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }

    public function updateUser($id)
    {
        //TODO: flesh out this method to update a user based on the provided user id
    }

    public function deleteUser($id)
    {
        //TODO: flesh out this method to delete a user based on the provided user id
    }



}