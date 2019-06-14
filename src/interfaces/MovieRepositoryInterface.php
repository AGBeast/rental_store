<?php


interface MovieRepositoryInterface
{
    public function findAll();
    public function findById($id);
    public function findByCategory($category_name);
    public function findAMoviesByActorName($actor_name);
    public function search($name);
    

}