<?php

interface CollectionInterface
{
    public function filterByRating($rating);
    public function filterByReleaseYear($year);
}