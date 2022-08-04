<?php
  class TaskService {
    private $connection;
    
    public function __construct() {
      $this->connection = new Connection();
    }

    public function add($task) {
      $sql = '
        INSERT INTO tb_task(id_user, task, task_description)
        VALUES (?, ?, ?)
      ';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(1, $task->__get('id_user'));
      $stmt->bindValue(2, $task->__get('task'));
      $stmt->bindValue(3, $task->__get('description'));
      return $stmt->execute();
    }

    public function list($task) {
      $sql = 'SELECT * FROM tb_task WHERE id_user = :id_user AND done = 0';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':id_user', $task->__get('id_user'));
      $stmt->execute();
      
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function listAll($task) {
      $sql = 'SELECT * FROM tb_task WHERE id_user = :id_user';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':id_user', $task->__get('id_user'));
      $stmt->execute();
      
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function markAsDone($task) {
      $sql = 'UPDATE tb_task SET done = 1 WHERE id = :id AND id_user = :id_user;';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':id', $task->__get('id'));
      $stmt->bindValue(':id_user', $task->__get('id_user'));

      return $stmt->execute();
    }

    public function deleteTask($task) {
      $sql = 'DELETE FROM tb_task WHERE id = :id AND id_user = :id_user';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':id', $task->__get('id'));
      $stmt->bindValue(':id_user', $task->__get('id_user'));

      return $stmt->execute();
    }

    public function updateTask($task) {
      $sql = '
        UPDATE tb_task SET task = ?, task_description = ?
        WHERE id_user = ? AND id = ?
      ';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(1, $task->__get('task'));
      $stmt->bindValue(2, $task->__get('description'));
      $stmt->bindValue(3, $task->__get('id_user'));
      $stmt->bindValue(4, $task->__get('id'));

      return $stmt->execute();
    }
  }
?>