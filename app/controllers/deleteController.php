<?php
require_once 'getSettersController.php';
require_once '../models/db.php';
require_once '../models/User.php';

class delete
{
    private $name;
    private $email;
    private $cpf;
    private $telephone;
    private $birthdate;

    private $pdo;

    public function __construct(PDO $pdo)
    {
        return $this->pdo = $pdo;
    }

    public function delete($id)
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
    }
}
