<?php
require_once 'getSettersController.php';
require_once '../models/db.php';
require_once '../models/User.php';

class create
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

    public function store()
    {
        $this->name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
        $this->email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $this->cpf = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);
        $this->telephone = filter_input(INPUT_POST, 'telephone', FILTER_DEFAULT);
        $this->birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_DEFAULT);

        $user = new User($this->pdo);
        $user->insert($this->name, $this->email, $this->cpf, $this->telephone, $this->birthdate);

        return;
    }

    public function gets()
    {
        $getSetters = new getSetters();

        $getSetters->setName($this->name);
        $getSetters->setEmail($this->email);
        $getSetters->setCpf($this->cpf);
        $getSetters->setTelephone($this->telephone);
        $getSetters->setBirthdate($this->birthdate);

        $name = $getSetters->getName();
        $email = $getSetters->getEmail();
        $cpf = $getSetters->getCpf();
        $telephone = $getSetters->getTelephone();
        $birthdate = $getSetters->getBirthdate();

        $array = [
            'name' => $name,
            'email' => $email,
            'cpf' => $cpf,
            'telephone' => $telephone,
            'birthdate' => $birthdate,
        ];

        return $array;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $instance = new create($pdo);
    $instance->store();
}
