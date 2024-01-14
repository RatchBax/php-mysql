<?php

require_once 'RepositoryInterface.php';
require_once 'User.php';
require_once './DatabaseInterface.php';

class UserRepository implements RepositoryInterface
{
    private DatabaseInterface $database;

    public function __construct(DatabaseInterface $database) { $this->database = $database; }

    public function getUser(string $userEmail) : User {
        $users = $this->database->fetchAll();

        foreach ($users as $userData) { 
            if ($userData['email'] === $userEmail) { return new User($userData['full_name'], $userData['email']); }
        }
    }

    public function getUsers() : array {
        $users = $this->database->fetchAll();
        $userObjects = [];

        foreach ($users as $userData) { $userObjects[] = new User($userData['full_name'], $userData['email']); }

        return $userObjects;
    }
}