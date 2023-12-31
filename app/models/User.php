<?php

class User
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        return $this->pdo = $pdo;
    }

    public function insert($name, $email, $cpf, $telephone, $birthdate)
    {
        $query = "INSERT INTO clientes (name, email, cpf, telephone,birthdate) VALUES (?,?,?,?,?)";
        $insert = $this->pdo->prepare($query);
        $insert->bindValue(1, $name);
        $insert->bindValue(2, $email);
        $insert->bindValue(3, $cpf);
        $insert->bindValue(4, $telephone);
        $insert->bindValue(5, $birthdate);

        try {
            $insert->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function read()
    {
        $query = "SELECT * FROM clientes";
        $read = $this->pdo->prepare($query);

        try {
            $read->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $read->fetchAll(PDO::FETCH_ASSOC);
    }

    public function edit($id)
    {
        $query = 'SELECT * FROM clientes WHERE id = :id';
        $edit = $this->pdo->prepare($query);
        $edit->bindValue(':id', $id); 
        
        try {
            $edit->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        return $edit;
    }

    public function update($id, $name, $email, $cpf, $telephone, $birthdate)
    {
        $query = "UPDATE clientes SET name = :name, email = :email, cpf = :cpf, telephone = :telephone, birthdate = :birthdate WHERE id = :id";
        $update = $this->pdo->prepare($query);
        $update->bindValue(':name', $name);
        $update->bindValue(':email', $email);
        $update->bindValue(':cpf', $cpf);
        $update->bindValue(':telephone', $telephone);
        $update->bindValue(':birthdate', $birthdate);
        $update->bindValue(':id', $id);

        try {
            $update->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM clientes WHERE id = :id";
        $delete = $this->pdo->prepare($query);
        $delete->bindValue(':id', $id);

        try {
            $delete->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
