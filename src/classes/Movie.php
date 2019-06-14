<?php

class Movie
{
    private $title;
    private $length;
    private $description;
    private $rental_duration;
    private $rental_rate;

    
    

    public function __construct($title,$length,$description, $rental_duration, $rental_rate)
    {
        $this->title = ucwords($title);
        $this->length = $length;
        $this->description = $description;
        $this->rental_duration = $rental_duration;
        $this->rental_rate = $rental_rate;
    }

    
    

}