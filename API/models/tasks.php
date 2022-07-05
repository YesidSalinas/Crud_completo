<?php

class Tasks{
    private string $id;
    private string $title;
    private string $description;

    public function setId(string $id){
        $this->id = $id;
    }
    public function setTitle(string $title){
        $this->title = $title;
    }
    public function setDescription(string $desc){
        $this->description = $desc;
    }


    // crud


    public static function All(){
        $sql = "SELECT * FROM task";
        $statement = Database::cnn()->prepare($sql);
        $statement->execute();

        $array= [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $array[] = $row;
        }

        return $array;
    }

    public function create(){
        $sql="INSERT INTO task (id,title,description) VALUES (?,?,?)";
        $statement = Database::cnn()->prepare($sql);
        $statement->bindParam(1, $this->id);
        $statement->bindParam(2, $this->title);
        $statement->bindParam(1, $this->description);
        $statement->execute();

        return $statement->rowCount();
    }

    public function update(){
        $sql = "UPDATE task SET title=?, description=?, WHERE id=?";
        $statement = Database::cnn()->prepare($sql);
        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->description);
        $statement->bindParam(1, $this->id);
        $statement->execute();

        return true;

    }

    public function delete(){
        $sql = "DELETE FROM `task` WHERE id=?";
        $statement = Database::cnn()->prepare($sql);
        $statement->bindParam(1, $this->id);
        $statement->execute();

        return $statement->rowConunt();
    }

    public function edit(){
        $sql = "SELECT * FROM `task` WHERE id=?";
        $statement = Database::cnn()->prepare($sql);
        $statement->bindParam(1, $this->id);
        $statement->execute();

        return $statement->rowConunt();
    }

}



















?>