<?php
  class Task {
    private $id;
    private $id_user;
    private $task;
    private $task_description;
    private $done;    

    public function __get($attr) {
      return $this->$attr;
    }

    public function __set($attr, $value) {
      $this->$attr = $value;
      return $this;
    }
  }
?>