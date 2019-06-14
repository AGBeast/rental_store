<?php

class MovieCollection 
{
    protected $repo;
    
    
    public function __construct(RepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function featuredFlicks()
    {
        return $this->repo->retrieveRandomMovies(5);
    }
}