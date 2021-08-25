<?php

class Database {
    private $_dbUser;
    private $_dbPassword;
    private $_dbHost;
    protected $_dbName;
    private $_connection;
    private static $_instance;
    private function __construct() {
        try {
            $this->_dbHost = "localhost";
            $this->_dbUser = "root";
            $this->_dbPassword = "";
            $this->_dbName = "zorro";
            $this->_connection = new \PDO('mysql:host=' . $this->_dbHost . '; dbname=' . $this->_dbName, $this->_dbUser, $this->_dbPassword);
            $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->_connection->exec("SET CHARACTER SET utf8");
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
    public function prepare($sql) {
        return $this->_connection->prepare($sql);
    }

    public static function instance() {
        if (!isset(self::$_instance)) {
            $class = __CLASS__;
            self::$_instance = new $class;
        }
        return self::$_instance;
    }

    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

}
?>