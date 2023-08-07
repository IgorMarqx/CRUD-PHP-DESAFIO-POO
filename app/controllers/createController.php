<?php
require_once 'getSettersController.php';
require_once '../models/db.php';

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

        $query = "INSERT INTO clientes (name, email, cpf, telephone,birthdate) VALUES (?,?,?,?,?)";
        $insert = $this->pdo->prepare($query);
        $insert->bindValue(1, $this->name);
        $insert->bindValue(2, $this->email);
        $insert->bindValue(3, $this->cpf);
        $insert->bindValue(4, $this->telephone);
        $insert->bindValue(5, $this->birthdate);
        $insert->execute();


        $array = $this->gets();
        return $array;
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

$instance = new create($pdo);

var_dump($instance->store());
