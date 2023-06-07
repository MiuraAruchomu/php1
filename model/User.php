<?php

class User
{
    private string $username;

    function __construct(string $username)
    {
        $this->username = $username;
    }

    public function getUsername(): string {
        return $this->username;
    }
}
