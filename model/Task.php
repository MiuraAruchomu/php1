<?php

class Task
{
    public string $description = "";
    public bool $isDone = false;

    function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isDone(): void
    {
        $this->isDone = true;
    }

    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    } 
}
