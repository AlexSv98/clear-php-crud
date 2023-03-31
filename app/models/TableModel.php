<?php

require_once "/var/www/task/app/core/Model.php";

class TableModel extends Model
{
    private $id;
    private $name;
    private $age;
    private $salary;


    public function getAll() {
        $sql = "SELECT * FROM workers";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

//        return $stmt->fetchAll();
        return $stmt;

    }

    public function findById($id) {
        $sql = "SELECT * FROM workers WHERE id=$id;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

//        return $stmt->fetchAll();
        return $stmt;

    }

    public function insertWorkers($name,$age,$salary) {
        $sql = "INSERT INTO workers SET name= :name, age= :age, salary= :salary;";
        $stmt = $this->connect()->prepare($sql);
        // Bind data
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':salary', $salary);

        $stmt->execute();
        return $stmt;
    }

    public function updateWorkers($id,$name,$age,$salary) {
        $sql = "UPDATE workers SET name= :name, age= :age, salary= :salary  WHERE id= :id;";
        $stmt = $this->connect()->prepare($sql);
        // Bind data
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return $stmt;
        }
        //error show
        printf("Error: %s.\n", $stmt->error);
        return false;

    }

    public function deleteWorkers($id) {
        $sql = "DELETE FROM workers WHERE id = $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->id]);

//        return $stmt->fetchAll();
        return $stmt;

    }

}