<?php
class dataBase{
    public static function cnn(){
        try{
            return new PDO('mysql:host=localhost;dbname=crud-php;charset=utf8','root');
        }catch(PDOException $err){
            echo json_encode(["msg" => $err]);
            die();
        }
    }
}

?>