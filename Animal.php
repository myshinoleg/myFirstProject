<?php

class Animal
{
    private $id;
    private $title;
    private $type;

    private function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($newTitle)
    {
        $this->title = $newTitle;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setType($newType)
    {
        $this->type = $newType;
    }

}