<?php

class Task
{
    public string $description = "";
    public int $id;

    function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    } 
}
