<?php
require_once 'getSettersController.php';
require_once '../models/db.php';
require_once '../models/User.php';

class update
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

    public function edit(int $id)
    {
        $id = $_GET['id'];
        if(!$id){
            header('location: ../../');
            return;
        }
        
        $this->name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
        $this->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $this->cpf = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);
        $this->telephone = filter_input(INPUT_POST, 'telephone', FILTER_DEFAULT);
        $this->birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_DEFAULT);

        $edit = new User($this->pdo);
        $edit->edit($id);
    }
}
