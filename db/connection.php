<?php
  class Connection {
    private $host = 'localhost';
    private $dbname = 'db_task_manager';
    private $user = 'root';
    private $pass = '';
    
    public function connect() {
      try {
        return new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
      } catch (PDOException $e) {
        echo 'Error: ' . $e->getCode() . ' - Message: ' . $e->getMessage();
      }
    }
  }
?>