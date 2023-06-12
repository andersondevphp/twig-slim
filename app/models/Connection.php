<?php

namespace app\models;

use PDO;

class Connection
{
    public static function connect()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=twig_slim;charset=utf8", "root", "}*1N0v@@Rt3#4011?+>");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $all = $this->connect->query($sdql);
        $all->execute();
        return $all->fetchAll();
    }
}