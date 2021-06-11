<?php
namespace App\Database;

use App\Config\Conexion;
use Pdo;

class DbProvider
{
    private static $_db;

    public static function get()
    {
        if(!self::$_db) {
            $conexion = new Conexion();            
            $pdo = new Pdo(
                $conexion->getHost(),
                $conexion->getUser(),
                $conexion->getPassword()
            );    
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            self::$_db = $pdo;
        }

        return self::$_db;
    }
}
