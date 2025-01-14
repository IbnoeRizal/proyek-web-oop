<?php

class Dbh
{
    private $host= "localhost";
    private $pwd = "";
    private $usrName = "root";
    private $dbName = "Mahasiswa";
    private $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    private static $pdo = null;

   protected function connection (){
    if ( self::$pdo=== null) {
       
            $dsn = 'mysql:host='.$this->host.';'.'dbname='.$this->dbName;
            self::$pdo = new PDO($dsn,$this->usrName,$this->pwd,$this->option);
   
    }
    return self::$pdo;
   
   }
   
}
